<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $subsektors = \App\Models\Subsektor::all();
        return view('auth.register', compact('subsektors'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_user' => ['required', 'string', 'max:255'],
            'username'  => ['required', 'string', 'max:20', 'unique:user'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'user_role' => ['required', 'in:user,komunitas,talent,tenant'],
            'subsektor_id_subsektor' => [
                'nullable',
                'exists:subsektor,id_subsektor',
                function ($attribute, $value, $fail) use ($request) {
                    if (in_array($request->user_role, ['komunitas', 'talent', 'tenant']) && empty($value)) {
                        $fail('Subsektor wajib dipilih untuk role ini.');
                    }
                },
            ],
        ]);

        $user = User::create([
            'nama_user' => $request->nama_user,
            'username'  => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'admin_role' => 'none',
            'user_role' => $request->user_role,
            'subsektor_id_subsektor' => $request->subsektor_id_subsektor ?? null,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}

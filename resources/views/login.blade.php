@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div>
    <label for="Email">Email</label>
    <input type="text" name="email" id="email" placeholder="Enter your email">
</div>
<div>
    <label for="password">Password</label>
    <input type="password" name="password" id="password" placeholder="••••••••">
</div>
@endsection
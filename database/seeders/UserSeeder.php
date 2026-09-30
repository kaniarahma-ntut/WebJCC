<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'nama_user' => 'Admin JCC',
                'role_user' => 'admin_JCC',
                'website' => null
            ],
            [
                'username' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('user123'),
                'nama_user' => 'user 1',
                'role_user' => 'user',
                'website' => null
            ],
        ]);
    }
}

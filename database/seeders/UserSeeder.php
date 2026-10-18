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
                'username' => 'adminJCC',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'nama_user' => 'Admin JCC',
                'admin_role' => 'admin_JCC',
                'user_role' => 'user',
                'website' => null,
                'subsektor_id_subsektor' => null
            ],
            [
                'username' => 'admindisporabudpar',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('admin123'),
                'nama_user' => 'Admin Disporabudpar',
                'admin_role' => 'admin_disporabudpar',
                'user_role' => 'user',
                'website' => null,
                'subsektor_id_subsektor' => null
            ],
            [
                'username' => 'komunitaskopijember',
                'email' => 'kopi@gmail.com',
                'password' => bcrypt('kopi123'),
                'nama_user' => 'Komunitas Kopi Jember',
                'admin_role' => 'none',
                'user_role' => 'komunitas',
                'website' => null,
                'subsektor_id_subsektor' => '11'
            ],
            [
                'username' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => bcrypt('user123'),
                'nama_user' => 'User 1',
                'admin_role' => 'none',
                'user_role' => 'user',
                'website' => null,
                'subsektor_id_subsektor' => null
            ],
        ]);
    }
}

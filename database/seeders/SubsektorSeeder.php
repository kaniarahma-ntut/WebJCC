<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubsektorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('subsektor')->insert([
        ['nama_subsektor' => 'Aplikasi'],
        ['nama_subsektor' => 'Arsitektur'],
        ['nama_subsektor' => 'Desain Interior'],
        ['nama_subsektor' => 'Desain Komunikasi Visual'],
        ['nama_subsektor' => 'Desain Produk'],
        ['nama_subsektor' => 'Fashion'],
        ['nama_subsektor' => 'Film dan Animasi'],
        ['nama_subsektor' => 'Fotografi'],
        ['nama_subsektor' => 'Game'],
        ['nama_subsektor' => 'Kriya'],
        ['nama_subsektor' => 'Kuliner'],
        ['nama_subsektor' => 'Musik'],
        ['nama_subsektor' => 'Penerbitan'],
        ['nama_subsektor' => 'Periklanan'],
        ['nama_subsektor' => 'Seni Pertunjukan'],
        ['nama_subsektor' => 'Seni Rupa'],
        ['nama_subsektor' => 'Televisi dan Radio'],
        ['nama_subsektor' => 'Teknologi Baru'],
        ['nama_subsektor' => 'Konten Digital'],
        ['nama_subsektor' => 'Sulih Suara'],
        ['nama_subsektor' => 'Modifikasi Otomatis'],
        ]);
    }
}

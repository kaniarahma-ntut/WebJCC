<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ruangan')->insert([
            [
                'nama_ruangan' => 'Ruang Podcast A',
                'kapasitas_ruangan' => 50,
                'deskripsi_ruangan' => 'Ruang untuk acara podcast',
                'gambar_ruangan' => null,
                'lokasi_ruangan' => 'Lantai 1',
                'is_active' => true,
                'luas_ruangan' => 100,
                'tarif_sewa_ruangan' => 150000
            ],
        ]);
    }
}

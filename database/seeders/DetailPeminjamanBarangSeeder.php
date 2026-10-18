<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailPeminjamanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_peminjaman_barang')->insert([
            [
                'created_at'      => '2026-10-20 08:00:00',
                'updated_at'      => '2026-10-20 08:00:00',
                'id_peminjaman_ruangan'=> '1',
                'id_peminjaman_barang'=> '1',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjaman_barang')->insert([
            [
                'start_time'      => '2026-10-20 08:00:00',
                'end_time'      => '2026-10-20 23:00:00',
                'created_at'      => '2026-10-20 08:00:00',
                'updated_at'      => '2026-10-20 08:00:00',
                'barang_id_barang'=> '1',
            ],
        ]);
    }
}

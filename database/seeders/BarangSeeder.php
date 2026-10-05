<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Canon EOS 5D Mark IV A',
                'jenis_barang' => 'Kamera',
                'deskripsi_barang' => 'Kamera digital dengan lensa yang dapat dilepas',
                'harga_sewa' => 120000,
                'gambar_barang' => null,
                'qr_barang' => null,
                'keywords_barang' => 'kamera',
                'is_active' => true
            ],
            [
                'nama_barang' => 'Canon EOS 5D Mark IV B',
                'jenis_barang' => 'Kamera',
                'deskripsi_barang' => 'Kamera digital dengan lensa yang dapat dilepas',
                'harga_sewa' => 120000,
                'gambar_barang' => null,
                'qr_barang' => null,
                'keywords_barang' => 'kamera',
                'is_active' => true
            ],
            [
                'nama_barang' => 'Wireless Speaker JBL Flip 5',
                'jenis_barang' => 'Speaker',
                'deskripsi_barang' => 'Speaker nirkabel dengan kualitas suara yang tinggi',
                'harga_sewa' => 120000,
                'gambar_barang' => null,
                'qr_barang' => null,
                'keywords_barang' => 'speaker',
                'is_active' => true
            ],
        ]);
    }
}
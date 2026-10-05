<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PeminjamanRuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('peminjaman_ruang')->insert([
            [
                'nama_event'    => 'Senam Club Segar - Sehat Bugar',
                'status_event'  => 'public',
                'link'          => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'kapasitas'     => '50',
                'noHP_CP'       => '081234567890',
                'start_time'    => '2024-06-01 08:00:00',
                'end_time'      => '2024-06-01 23:59:00',
                'status_peminjaman'=> 'approved',
                'status_pembayaran'=> 'pending',
                'total_harga'     => '120000',
                'created_at'      => '2024-06-01 08:00:00',
                'updated_at'      => '2024-06-01 08:00:00',
                'user_id_user'    => '2',
                'ruangan_id_ruangan'    => '2',
            ],
        ]);
    }
}

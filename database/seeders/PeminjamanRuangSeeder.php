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
                'file_pendukung' => 'public/file.pdf',
                'start_time'      => '2026-10-20 08:00:00',
                'end_time'      => '2026-10-20 23:00:00',
                'status_peminjaman'=> 'pending',
                'status_pembayaran'=> 'pending',
                'total_harga'     => '120000',
                'surat_peminjaman' => 'public/surat.pdf',
                'catatan_admin'   => null,
                'created_at'      => '2026-10-20 08:00:00',
                'updated_at'      => '2026-10-20 08:00:00',
                'user_id_user'    => '4',
                'ruangan_id_ruangan'    => '2',
                'snap_token'    => null,
            ],
            [
                'nama_event'    => 'Kunjungan Bulanan Disporabudpar',
                'status_event'  => 'private',
                'link'          => '-',
                'kapasitas'     => '50',
                'noHP_CP'       => '081234567890',
                'file_pendukung' => 'public/file.pdf',
                'start_time'      => '2026-10-21 08:00:00',
                'end_time'      => '2026-10-21 23:00:00',
                'status_peminjaman'=> 'approved',
                'status_pembayaran'=> 'completed',
                'total_harga'     => '150000',
                'surat_peminjaman' => 'public/surat.pdf',
                'catatan_admin'   => null,
                'created_at'      => '2026-10-21 08:00:00',
                'updated_at'      => '2026-10-21 08:00:00',
                'user_id_user'    => '1',
                'ruangan_id_ruangan'    => '1',
                'snap_token'    => null,
                
            ],
        ]);
    }
}

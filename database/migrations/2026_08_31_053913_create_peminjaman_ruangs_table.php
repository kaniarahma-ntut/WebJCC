<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_ruang', function (Blueprint $table) {
            $table->id('id_peminjaman_ruangan');
            $table->string('nama_event', 100);
            $table->enum('status_event', [
                    'public', 
                    'private'
                ])->default('private');
            $table->text('link')->nullable();
            $table->integer('kapasitas');
            $table->string('noHP_CP', 15);
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->enum('status_peminjaman', [
                    'pending', 
                    'approved', 
                    'declined'
                ])->default('pending');
            $table->enum('status_pembayaran', [
                    'pending', 
                    'completed', 
                    'failed'
                ])->default('pending');    
            $table->integer('total_harga');
            $table->string('snap_token')->nullable();
            $table->timestamp('batas_pembayaran')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->string('surat_peminjaman')->nullable();
            $table->string('file_pendukung')->nullable();
            
            $table->unsignedBigInteger('user_id_user');
            $table->unsignedBigInteger('ruangan_id_ruangan');
            $table->foreign('user_id_user')->references('id_user')->on('user');
            $table->foreign('ruangan_id_ruangan')->references('id_ruangan')->on('ruangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_ruang');
    }
};

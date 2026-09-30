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
        Schema::create('detail_peminjaman_barang', function (Blueprint $table) {
            $table->id('id_detail_peminjaman');
            
            $table->unsignedBigInteger('id_peminjaman_ruangan');
            $table->unsignedBigInteger('id_peminjaman_barang');
            
            $table->foreign('id_peminjaman_ruangan')->references('id_peminjaman_ruangan')->on('peminjaman_ruang');
            $table->foreign('id_peminjaman_barang')->references('id_peminjaman_barang')->on('peminjaman_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman_barang');
    }
};

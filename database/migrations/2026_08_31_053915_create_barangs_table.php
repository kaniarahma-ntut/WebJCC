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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang', 255);
            $table->string('jenis_barang', 100);
            $table->integer('harga_sewa');
            $table->string('gambar_barang', 255)->nullable();
            $table->string('qr_barang', 255)->nullable();
            $table->text('deskripsi_barang')->nullable();
            $table->string('keywords_barang', 50)->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};

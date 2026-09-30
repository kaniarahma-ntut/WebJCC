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
        Schema::create('ruangan', function (Blueprint $table) {
            $table->id('id_ruangan');
            $table->string('nama_ruangan', 200);
            $table->integer('kapasitas_ruangan');
            $table->integer('luas_ruangan');
            $table->integer('tarif_sewa_ruangan');
            $table->text('deskripsi_ruangan')->nullable(); //
            $table->string('gambar_ruangan', 255)->nullable();
            $table->string('lokasi_ruangan', 255);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};

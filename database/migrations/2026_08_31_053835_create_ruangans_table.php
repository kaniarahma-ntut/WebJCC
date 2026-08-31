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
            $table->string('jenis_ruangan', 50);
            $table->integer('kapasitas_ruangan');
            $table->text('deskripsi_ruangan')->nullable(); //CLOB
            $table->binary('gambar_ruangan')->nullable();  //BLOB
            $table->string('lokasi_ruangan', 255);
            $table->char('is_active', 1)->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};

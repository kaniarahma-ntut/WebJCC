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
        Schema::create('karya', function (Blueprint $table) {
            $table->id('id_karya');
            $table->string('judul_karya', 150);
            $table->string('kategori_karya', 50);
            $table->text('deskripsi_karya')->nullable();
            $table->binary('foto_karya_1')->nullable();
            $table->binary('foto_karya_2')->nullable();
            $table->binary('foto_karya_3')->nullable();
            $table->text('embed_video')->nullable();
            $table->integer('views_count')->default(0);
            
            $table->unsignedBigInteger('user_id_user');
            $table->foreign('user_id_user')->references('id_user')->on('user')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyas');
    }
};

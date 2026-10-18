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
        Schema::create('user', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username', 20)->unique();
            $table->string('email', 100)->unique();
            $table->string('password', 255); 
            $table->string('nama_user', 255);
            $table->enum('admin_role', [
                'admin_JCC', 
                'admin_Disporabudpar', 
                'none'
                ])->default('none');
            $table->enum('user_role', [
                'user', 
                'komunitas', 
                'talent', 
                'tenant'
                ])->default('user');
            $table->string('website', 255)->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('subsektor_id_subsektor')->nullable();
            $table->foreign('subsektor_id_subsektor')->references('id_subsektor')->on('subsektor')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

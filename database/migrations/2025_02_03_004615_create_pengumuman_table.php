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
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->text('isi');
            $table->unsignedBigInteger('kategori_pengumuman_id')->index();
            $table->string('referensi')->nullable();
            $table->timestamp('tanggal');
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamps();

            $table->foreign('kategori_pengumuman_id')->references('id')->on('kategori_pengumuman')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};

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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kegiatan');
            $table->text('deskripsi');
            $table->timestamp('tanggal_mulai')->useCurrent();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->string('lokasi');
            $table->integer('jumlah');
            $table->unsignedBigInteger('kategori_kegiatan_id')->nullable()->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamps();

            $table->foreign('kategori_kegiatan_id')->references('id')->on('kategori_kegiatan')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};

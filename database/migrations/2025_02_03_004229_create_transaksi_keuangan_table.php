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
        Schema::create('transaksi_keuangan', function (Blueprint $table) {
            $table->id();
            $table->integer('saldo');
            $table->timestamp('tanggal');
            $table->text('keterangan');
            $table->unsignedBigInteger('kategori_transaksi_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('kegiatan_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('kategori_transaksi_id')->references('id')->on('kategori_transaksi')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_keuangan');
    }
};

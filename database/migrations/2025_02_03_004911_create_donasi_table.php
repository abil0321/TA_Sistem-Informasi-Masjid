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
        Schema::create('donasi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_donatur');
            $table->string('email');
            $table->string('no_telp');
            $table->integer('jumlah');
            $table->unsignedBigInteger('transaksi_id')->index();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('transaksi_id')->references('id')->on('transaksi_keuangan')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donasi');
    }
};

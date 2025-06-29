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
        Schema::table('donasi', function (Blueprint $table) {
            $table->dropForeign(['transaksi_id']);
            $table->dropColumn('transaksi_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donasi', function (Blueprint $table) {
            $table->unsignedBigInteger('transaksi_id')->index();
            $table->foreign('transaksi_id')->references('id')->on('transaksi_keuangan')->onDelete('cascade');
        });
    }
};

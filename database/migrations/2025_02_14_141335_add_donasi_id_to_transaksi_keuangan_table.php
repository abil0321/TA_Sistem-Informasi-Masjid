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
        Schema::table('transaksi_keuangan', function (Blueprint $table) {
            $table->unsignedBigInteger('donasi_id')->after('kegiatan_id')->nullable()->index(); // Menambahkan kolom donasi_id
            $table->foreign('donasi_id')->references('id')->on('donasi')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_keuangan', function (Blueprint $table) {
            $table->dropForeign(['donasi_id']); // Menghapus foreign key
            $table->dropColumn('donasi_id');
        });
    }
};

<?php

namespace App\Observers;

use App\Models\Donasi;
use App\Models\KategoriTransaksi;
use App\Models\TransaksiKeuangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DonasiObserver
{
    public function created(Donasi $donasi)
    {
        DB::transaction(function () use ($donasi) {
            try {
                // Membuat record baru di tabel transaksi untuk setiap donasi
                TransaksiKeuangan::create([
                    'saldo' => $this->calculateNewBalance($donasi->jumlah),
                    'tanggal' => now('Asia/Jakarta'),
                    'keterangan' => "Donasi dari {$donasi->nama_donatur}",
                    'kategori_transaksi_id' => KategoriTransaksi::PEMASUKAN, // Kategori pemasukan (1)
                    'user_id' => $donasi->user_id,
                    'kegiatan_id' => null, // Explicitly set null untuk kegiatan
                    'donasi_id' => $donasi->id
                ]);

                Log::info('Transaksi donasi berhasil dicatat', [
                    'donasi_id' => $donasi->id,
                    'jumlah' => $donasi->jumlah,
                    'nama_donatur' => $donasi->nama_donatur
                ]);
            } catch (\Exception $e) {
                Log::error('Error saat mencatat transaksi donasi: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    public function updated(Donasi $donasi)
    {
        DB::transaction(function () use ($donasi) {
            try {
                // Mendapatkan transaksi yang terkait dengan donasi ini
                $transaksi = TransaksiKeuangan::where('donasi_id', $donasi->id)->first();

                if ($transaksi) {
                    // Menghapus transaksi lama
                    $transaksi->delete();

                    Log::info('Transaksi donasi lama berhasil dihapus', [
                        'donasi_id' => $donasi->id,
                        'jumlah' => $transaksi->saldo,
                        'nama_donatur' => $donasi->nama_donatur
                    ]);
                }

                // Membuat transaksi baru dengan jumlah yang diperbarui
                TransaksiKeuangan::create([
                    'saldo' => $this->calculateNewBalance($donasi->jumlah),
                    'tanggal' => now(),
                    'keterangan' => "Perubahan donasi dari {$donasi->nama_donatur}",
                    'kategori_transaksi_id' => KategoriTransaksi::PEMASUKAN, // Kategori pemasukan (1)
                    'user_id' => $donasi->user_id,
                    'kegiatan_id' => null, // Explicitly set null untuk kegiatan
                    'donasi_id' => $donasi->id
                ]);

                Log::info('Transaksi donasi baru berhasil dicatat', [
                    'donasi_id' => $donasi->id,
                    'jumlah' => $donasi->jumlah,
                    'nama_donatur' => $donasi->nama_donatur
                ]);
            } catch (\Exception $e) {
                Log::error('Error saat memperbarui transaksi donasi: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    public function deleting(Donasi $donasi)
    {
        DB::transaction(function () use ($donasi) {
            try {
                // Menghapus transaksi yang terkait dengan donasi ini
                TransaksiKeuangan::where('donasi_id', $donasi->id)->delete();

                Log::info('Transaksi donasi berhasil dihapus', [
                    'donasi_id' => $donasi->id,
                    'jumlah' => $donasi->jumlah,
                    'nama_donatur' => $donasi->nama_donatur
                ]);
            } catch (\Exception $e) {
                Log::error('Error saat menghapus transaksi donasi: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    public function deleted(Donasi $donasi)
    {}

    private function calculateNewBalance(int $amount): int
    {
        $lastTransaction = TransaksiKeuangan::latest()->first();
        $currentBalance = $lastTransaction ? $lastTransaction->saldo : 0;
        return $currentBalance + $amount;
    }
}

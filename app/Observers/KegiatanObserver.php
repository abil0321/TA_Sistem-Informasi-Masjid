<?php

namespace App\Observers;

use App\Models\KategoriTransaksi;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class KegiatanObserver
{
    public function created(Kegiatan $kegiatan)
    {
        DB::transaction(function () use ($kegiatan) {
            try {
                $lastBalance = $this->getLastBalance();

                // Validasi saldo mencukupi
                if ($lastBalance < $kegiatan->jumlah) {
                    throw new \Exception('Saldo tidak mencukupi untuk pengeluaran ini');
                }

                // Membuat record baru di tabel transaksi untuk setiap pengeluaran kegiatan
                TransaksiKeuangan::create([
                    'saldo' => $this->calculateNewBalance($kegiatan->jumlah),
                    'tanggal' => now('Asia/Jakarta'),
                    'keterangan' => "Pengeluaran untuk {$kegiatan->nama_kegiatan}",
                    'kategori_transaksi_id' => KategoriTransaksi::PENGELUARAN, // Kategori pengeluaran (2)
                    'user_id' => $kegiatan->user_id,
                    'kegiatan_id' => $kegiatan->id,
                    'donasi_id' => null // Explicitly set null untuk donasi
                ]);

                Log::info('Transaksi kegiatan berhasil dicatat', [
                    'kegiatan_id' => $kegiatan->id,
                    'jumlah' => $kegiatan->jumlah,
                    'nama_kegiatan' => $kegiatan->nama_kegiatan
                ]);
            } catch (\Exception $e) {
                Log::error('Error saat mencatat transaksi kegiatan: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    public function updated(Kegiatan $kegiatan)
    {
        DB::transaction(function () use ($kegiatan) {
            try {
                // Mendapatkan transaksi yang terkait dengan kegiatan ini
                $transaksi = TransaksiKeuangan::where('kegiatan_id', $kegiatan->id)->first();

                if ($transaksi) {
                    // Menghapus transaksi lama
                    $transaksi->delete();

                    Log::info('Transaksi kegiatan lama berhasil dihapus', [
                        'kegiatan_id' => $kegiatan->id,
                        'jumlah' => $transaksi->saldo,
                        'nama_kegiatan' => $kegiatan->nama_kegiatan
                    ]);
                }

                // Validasi saldo mencukupi untuk jumlah baru
                $lastBalance = $this->getLastBalance();
                if ($lastBalance < $kegiatan->jumlah) {
                    throw new \Exception('Saldo tidak mencukupi untuk pengeluaran ini');
                }

                // Membuat transaksi baru dengan jumlah yang diperbarui
                TransaksiKeuangan::create([
                    'saldo' => $this->calculateNewBalance($kegiatan->jumlah),
                    'tanggal' => now(),
                    'keterangan' => "Perubahan pengeluaran untuk {$kegiatan->nama_kegiatan}",
                    'kategori_transaksi_id' => KategoriTransaksi::PENGELUARAN, // Kategori pengeluaran (2)
                    'user_id' => $kegiatan->user_id,
                    'kegiatan_id' => $kegiatan->id,
                    'donasi_id' => null // Explicitly set null untuk donasi
                ]);

                Log::info('Transaksi kegiatan baru berhasil dicatat', [
                    'kegiatan_id' => $kegiatan->id,
                    'jumlah' => $kegiatan->jumlah,
                    'nama_kegiatan' => $kegiatan->nama_kegiatan
                ]);
            } catch (\Exception $e) {
                Log::error('Error saat memperbarui transaksi kegiatan: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    public function deleting(Kegiatan $kegiatan)
    {
        DB::transaction(function () use ($kegiatan) {
            try {
                // Menghapus transaksi yang terkait dengan kegiatan ini
                TransaksiKeuangan::where('kegiatan_id', $kegiatan->id)->delete();

                Log::info('Transaksi kegiatan berhasil dihapus', [
                    'kegiatan_id' => $kegiatan->id,
                    'jumlah' => $kegiatan->jumlah,
                    'nama_kegiatan' => $kegiatan->nama_kegiatan
                ]);
            } catch (\Exception $e) {
                Log::error('Error saat menghapus transaksi kegiatan: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    public function deleted(Kegiatan $kegiatan)
    {}

    private function getLastBalance(): int
    {
        $lastTransaction = TransaksiKeuangan::latest()->first();
        return $lastTransaction ? $lastTransaction->saldo : 0;
    }

    private function calculateNewBalance(int $amount): int
    {
        $lastTransaction = TransaksiKeuangan::latest()->first();
        $currentBalance = $lastTransaction ? $lastTransaction->saldo : 0;
        return $currentBalance - $amount;
    }
}

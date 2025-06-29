<?php

namespace App\Observers;

use App\Models\KategoriTransaksi;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Filament\Notifications\Notification;

class KegiatanObserver
{
    public function created(Kegiatan $kegiatan)
    {
        DB::transaction(function () use ($kegiatan) {
            try {
                TransaksiKeuangan::create([
                    'saldo' => $this->calculateNewBalance(0, $kegiatan->jumlah, KategoriTransaksi::PENGELUARAN),
                    'tanggal' => now('Asia/Jakarta'),
                    'keterangan' => "Pengeluaran untuk {$kegiatan->nama_kegiatan}",
                    'kategori_transaksi_id' => KategoriTransaksi::PENGELUARAN,
                    'user_id' => $kegiatan->user_id,
                    'kegiatan_id' => $kegiatan->id,
                    'donasi_id' => null
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
                $transaksi = TransaksiKeuangan::where('kegiatan_id', $kegiatan->id)->first();

                if ($transaksi) {
                    $oldAmount = $kegiatan->getOriginal('jumlah');
                    $currentBalance = $this->getLastBalance();

                    // Kembalikan saldo ke kondisi sebelum transaksi ini ada
                    $updatedBalance = $currentBalance + $oldAmount;

                    // Mencatat perubahan sebelum menghapus transaksi lama
                    Log::info('Transaksi kegiatan lama berhasil dihapus', [
                        'kegiatan_id' => $kegiatan->id,
                        'jumlah_lama' => $oldAmount,
                        'jumlah_baru' => $kegiatan->jumlah,
                        'nama_kegiatan' => $kegiatan->nama_kegiatan
                    ]);

                    $transaksi->delete();

                    // Membuat transaksi baru dengan jumlah yang diperbarui
                    TransaksiKeuangan::create([
                        'saldo' => $updatedBalance - $kegiatan->jumlah,
                        'tanggal' => now('Asia/Jakarta'),
                        'keterangan' => "Perubahan pengeluaran untuk {$kegiatan->nama_kegiatan}",
                        'kategori_transaksi_id' => KategoriTransaksi::PENGELUARAN,
                        'user_id' => $kegiatan->user_id,
                        'kegiatan_id' => $kegiatan->id,
                        'donasi_id' => null
                    ]);

                    Log::info('Transaksi kegiatan baru berhasil dicatat', [
                        'kegiatan_id' => $kegiatan->id,
                        'jumlah' => $kegiatan->jumlah,
                        'nama_kegiatan' => $kegiatan->nama_kegiatan
                    ]);
                }
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
                $transaksi = TransaksiKeuangan::where('kegiatan_id', $kegiatan->id)->first();

                if ($transaksi) {
                    // Mencatat penghapusan sebelum transaksi dihapus
                    Log::info('Transaksi kegiatan berhasil dihapus dan saldo disesuaikan', [
                        'kegiatan_id' => $kegiatan->id,
                        'jumlah' => $kegiatan->jumlah,
                        'nama_kegiatan' => $kegiatan->nama_kegiatan
                    ]);

                    $transaksi->delete();

                    // Membuat transaksi baru untuk menambahkan kembali jumlah pengeluaran yang dihapus
                    TransaksiKeuangan::create([
                        'saldo' => $this->calculateNewBalance($kegiatan->jumlah, 0, KategoriTransaksi::PEMASUKAN),
                        'tanggal' => now('Asia/Jakarta'),
                        'keterangan' => "Pembatalan pengeluaran untuk {$kegiatan->nama_kegiatan}",
                        'kategori_transaksi_id' => KategoriTransaksi::PEMASUKAN,
                        'user_id' => $kegiatan->user_id,
                        'kegiatan_id' => null,
                        'donasi_id' => null
                    ]);
                }
            } catch (\Exception $e) {
                Log::error('Error saat menghapus transaksi kegiatan: ' . $e->getMessage());
                throw $e;
            }
        });
    }

    public function getLastBalance(): int
    {
        $lastTransaction = TransaksiKeuangan::latest()->first();
        return $lastTransaction ? $lastTransaction->saldo : 0;
    }

    private function calculateNewBalance(int $oldAmount, int $newAmount, int $kategori): int
    {
        $lastTransaction = TransaksiKeuangan::latest()->first();
        $currentBalance = $lastTransaction ? $lastTransaction->saldo : 0;

        if ($kategori === KategoriTransaksi::PEMASUKAN) {
            return $currentBalance + $oldAmount + $newAmount;
        } else {
            return $currentBalance + $oldAmount - $newAmount;
        }
    }
}

<?php

namespace App\Observers;

use App\Models\Donasi;
use App\Models\KategoriTransaksi;
use App\Models\TransaksiKeuangan;
use Filament\Notifications\Notification;
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
                    'saldo' => $this->calculateNewBalance(0, $donasi->jumlah),
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
                    // Simpan jumlah donasi lama sebelum menghapus transaksi
                    // $oldAmount = $donasi->getOriginal('jumlah');
                    $oldAmount = $donasi->getOriginal('jumlah');
                    $currentBalance = $this->getLastBalance();

                    // Kembalikan saldo ke kondisi sebelum transaksi ini ada
                    $updatedBalance = $currentBalance - $oldAmount;

                    // Menghapus transaksi lama
                    $transaksi->delete();

                    Log::info('Transaksi donasi lama berhasil dihapus', [
                        'donasi_id' => $donasi->id,
                        'jumlah_lama' => $oldAmount,
                        'jumlah_baru' => $donasi->jumlah,
                        'nama_donatur' => $donasi->nama_donatur
                    ]);

                    // Membuat transaksi baru dengan jumlah yang diperbarui
                    // Kurangi jumlah lama dan tambahkan jumlah baru
                    TransaksiKeuangan::create([
                        // 'saldo' => $this->calculateNewBalance($oldAmount, $donasi->jumlah),
                        'saldo' => $updatedBalance + $donasi->jumlah,
                        'tanggal' => now('Asia/Jakarta'),
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
                }
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
                // $currentBalance = $this->getLastBalance();

                // // Cek apakah saldo cukup untuk menghapus donasi
                // if ($currentBalance < $donasi->jumlah) {
                //     // Tampilkan notifikasi Filament
                //     Notification::make()
                //         ->title('Penghapusan Gagal')
                //         ->body("Saldo tidak mencukupi untuk menghapus donasi sebesar Rp " . number_format($donasi->jumlah, 0, ',', '.'))
                //         ->danger()
                //         ->send();

                //     return false; // Hentikan proses penghapusan
                // }
                
                // Mendapatkan transaksi yang terkait dengan donasi ini
                $transaksi = TransaksiKeuangan::where('donasi_id', $donasi->id)->first();

                if ($transaksi) {

                    // $oldAmount = $donasi->getOriginal('jumlah');
                    $oldAmount = $donasi->getOriginal('jumlah');
                    $currentBalance = $this->getLastBalance();

                    // Kembalikan saldo ke kondisi sebelum transaksi ini ada
                    $updatedBalance = $currentBalance - $oldAmount;
                    // Menghapus transaksi yang terkait dengan donasi ini
                    $transaksi->delete();

                    // Buat transaksi baru untuk mengurangi saldo
                    TransaksiKeuangan::create([
                        // 'saldo' => $this->calculateNewBalance($oldAmount, newAmount: 0),
                        'saldo' => $updatedBalance,
                        'tanggal' => now('Asia/Jakarta'),
                        'keterangan' => "Pembatalan donasi dari {$donasi->nama_donatur}",
                        'kategori_transaksi_id' => KategoriTransaksi::PENGELUARAN, // Kategori pengeluaran (2)
                        'user_id' => $donasi->user_id,
                        'kegiatan_id' => null,
                        'donasi_id' => null // Set null karena donasi ini akan dihapus
                    ]);
                }

                Log::info('Transaksi donasi berhasil dihapus dan saldo disesuaikan', [
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

    public function deleted(Donasi $donasi) {}

    /**
     * Calculate the new balance by considering the old and new donation amounts
     * 
     * @param int $oldAmount The old donation amount (0 for new donations)
     * @param int $newAmount The new donation amount
     * @return int The new balance
     */

    // private function deleter(int $oldAmount)
    // {
    //     $lastTransaction = TransaksiKeuangan::latest()->first();
    //     $currentBalance = $lastTransaction ? $lastTransaction->saldo : 0;

    //     return $currentBalance - $oldAmount;
    // }

    public function getLastBalance(): int
    {
        $lastTransaction = TransaksiKeuangan::latest()->first();
        return $lastTransaction ? $lastTransaction->saldo : 0;
    }

    private function calculateNewBalance(int $oldAmount, int $newAmount): int
    {
        $lastTransaction = TransaksiKeuangan::latest()->first();
        $currentBalance = $lastTransaction ? $lastTransaction->saldo : 0;

        // For updates, subtract the old amount and add the new amount
        // For new donations, oldAmount will be 0
        // For deletions, newAmount will be 0
        return $currentBalance - $oldAmount + $newAmount;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function transaksi_keuangan()
    {
        $transaksi_keuangan = TransaksiKeuangan::with('donasi', 'kegiatan')
            ->orderBy('tanggal', 'desc') // Mengurutkan berdasarkan tanggal terbaru
            ->paginate(5);

        return view('pages.laporan.transaksi-keuangan', [
            'transaksi_keuangan' => $transaksi_keuangan,
            'page_meta' => [
                'page' => 'Laporan',
                'header' => 'Laporan Transaksi Keuangan Masjid',
                'foto' => 'assets/img/masjid-5.jpg',
            ]
        ]);
    }

    public function pemasukan()
    {
        $pemasukan = Donasi::orderBy('created_at', 'desc') // Urutkan berdasarkan waktu dibuat
            ->paginate(5);

        return view('pages.laporan.pemasukan', [
            'pemasukan' => $pemasukan,
            'page_meta' => [
                'page' => 'Laporan',
                'header' => 'Laporan Pemasukan Masjid',
                'foto' => 'assets/img/masjid-5.jpg',
            ]
        ]);
    }

    public function pengeluaran()
    {
        $pengeluaran = Kegiatan::with('kategoriKegiatan')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('pages.laporan.pengeluaran', [
            'pengeluaran' => $pengeluaran,
            'page_meta' => [
                'page' => 'Laporan',
                'header' => 'Laporan Pengeluaran Masjid',
                'foto' => 'assets/img/masjid-5.jpg',
            ]
        ]);
    }
}

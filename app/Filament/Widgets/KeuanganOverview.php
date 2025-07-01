<?php

namespace App\Filament\Widgets;

use App\Models\Donasi;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class KeuanganOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $jumlahDonasi = Donasi::sum('jumlah');
        $jumlahKegiatan = Kegiatan::sum('jumlah');
        $jumlahTransaksi = TransaksiKeuangan::latest()->first()->saldo ?? 0;

        return [
            Stat::make('Total Pemasukan', "Rp " . number_format($jumlahDonasi,0,',','.')),
            Stat::make('Total Pengeluaran', "Rp " . number_format($jumlahKegiatan, 0, ',', '.')),
            Stat::make('Saldo', "Rp " . number_format($jumlahTransaksi ?? 0, 0, ',', '.')),
        ];
    }
}

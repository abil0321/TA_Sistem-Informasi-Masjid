<?php

namespace App\Filament\Widgets;

use App\Models\Donasi;
use App\Models\Kegiatan;
use App\Models\TransaksiKeuangan;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalDonasi = Donasi::count();
        $totalKegiatan = Kegiatan::count();
        $totalTransaksiKeuangan = TransaksiKeuangan::count();

        return [
            Stat::make('Total Donasi', $totalDonasi . " Donasi"),
            Stat::make('Total Kegiatan', $totalKegiatan . " Kegiatan"),
            Stat::make('Total Transaksi Keuangan', $totalTransaksiKeuangan . " Transaksi"),
        ];
    }
}

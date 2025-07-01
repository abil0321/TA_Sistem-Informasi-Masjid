<?php

namespace App\Filament\Widgets;

use App\Models\TransaksiKeuangan;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SaldoChart extends ChartWidget
{
    protected static ?string $heading = 'Saldo Per Hari';

    protected static ?int $sort = 2;

    // Mengurangi interval polling agar data lebih sering diperbarui
    protected static ?string $pollingInterval = '10s';

    // Mengatur chart agar mengisi lebar penuh column
    protected int | string | array $columnSpan = 'full';

    // Filter state
    public ?string $selectedWeek = null;
    public ?string $startDate = null;
    public ?string $endDate = null;
    public string $filterType = 'week'; // 'week' atau 'custom'

    public function mount(): void
    {
        // Default ke minggu saat ini saat pertama kali dimuat
        $this->selectedWeek = now()->setTimezone('Asia/Jakarta')->format('Y-W');

        // Default untuk rentang kustom
        $this->startDate = now()->setTimezone('Asia/Jakarta')->startOfWeek(Carbon::MONDAY)->format('Y-m-d');
        $this->endDate = now()->setTimezone('Asia/Jakarta')->endOfWeek(Carbon::SUNDAY)->format('Y-m-d');
    }

    protected function getFormSchema(): array
    {
        return [
            Select::make('filterType')
                ->label('Tipe Filter')
                ->options([
                    'week' => 'Filter Per Minggu',
                    'custom' => 'Rentang Tanggal Kustom',
                ])
                ->default('week')
                ->live()
                ->afterStateUpdated(function () {
                    $this->updateChartData();
                }),

            Select::make('selectedWeek')
                ->label('Pilih Minggu')
                ->options($this->generateWeeklyOptions())
                ->default(now()->setTimezone('Asia/Jakarta')->format('Y-W'))
                ->live()
                ->visible(fn(callable $get) => $get('filterType') === 'week')
                ->afterStateUpdated(function () {
                    $this->updateChartData();
                }),

            Grid::make()
                ->schema([
                    DatePicker::make('startDate')
                        ->label('Tanggal Mulai')
                        ->default(now()->setTimezone('Asia/Jakarta')->startOfWeek(Carbon::MONDAY)->format('Y-m-d'))
                        ->format('Y-m-d')
                        ->displayFormat('d M Y')
                        ->maxDate(fn(callable $get) => $get('endDate'))
                        ->live()
                        ->afterStateUpdated(function () {
                            $this->updateChartData();
                        }),

                    DatePicker::make('endDate')
                        ->label('Tanggal Akhir')
                        ->default(now()->setTimezone('Asia/Jakarta')->endOfWeek(Carbon::SUNDAY)->format('Y-m-d'))
                        ->format('Y-m-d')
                        ->displayFormat('d M Y')
                        ->minDate(fn(callable $get) => $get('startDate'))
                        ->live()
                        ->afterStateUpdated(function () {
                            $this->updateChartData();
                        }),
                ])
                ->visible(fn(callable $get) => $get('filterType') === 'custom')
                ->columns(2),
        ];
    }

    protected function generateWeeklyOptions(): array
    {
        $weeks = [];
        for ($i = 0; $i < 8; $i++) { // 8 minggu terakhir
            $week = now()->setTimezone('Asia/Jakarta')->subWeeks($i);
            $startDate = $week->copy()->startOfWeek(Carbon::MONDAY);
            $endDate = $week->copy()->endOfWeek(Carbon::SUNDAY);

            $label = 'Minggu ' . $week->format('W') . ' (' . $startDate->format('d M') . ' - ' . $endDate->format('d M') . ')';
            $weeks[$week->format('Y-W')] = $label;
        }
        return $weeks;
    }

    protected function getData(): array
    {
        $today = now()->setTimezone('Asia/Jakarta')->format('Y-m-d');

        // Tentukan rentang tanggal berdasarkan filter yang dipilih
        if ($this->filterType === 'week') {
            $selectedWeek = $this->selectedWeek ?? now()->setTimezone('Asia/Jakarta')->format('Y-W');

            try {
                // Parse week string into year and week number
                [$year, $week] = explode('-', $selectedWeek);

                // Create Carbon instances for start and end of week
                $startDate = Carbon::now()
                    ->setTimezone('Asia/Jakarta')
                    ->setISODate((int) $year, (int) $week)
                    ->startOfWeek(Carbon::MONDAY)
                    ->format('Y-m-d');

                $endDate = Carbon::now()
                    ->setTimezone('Asia/Jakarta')
                    ->setISODate((int) $year, (int) $week)
                    ->endOfWeek(Carbon::SUNDAY)
                    ->format('Y-m-d');
            } catch (\Exception $e) {
                // Fallback to current week if parsing fails
                $startDate = now()->setTimezone('Asia/Jakarta')->startOfWeek(Carbon::MONDAY)->format('Y-m-d');
                $endDate = now()->setTimezone('Asia/Jakarta')->endOfWeek(Carbon::SUNDAY)->format('Y-m-d');
            }
        } else {
            // Custom date range
            $startDate = $this->startDate ?? now()->setTimezone('Asia/Jakarta')->subDays(7)->format('Y-m-d');
            $endDate = $this->endDate ?? now()->setTimezone('Asia/Jakarta')->format('Y-m-d');
        }

        // Pastikan endDate tidak lebih dari 31 hari dari startDate untuk mencegah grafik terlalu padat
        $maxEndDate = Carbon::parse($startDate)->addDays(31)->format('Y-m-d');
        if (Carbon::parse($endDate)->gt(Carbon::parse($maxEndDate))) {
            $endDate = $maxEndDate;
        }

        // Gunakan query SQL langsung tanpa caching untuk memastikan data selalu terbaru
        $query = "SELECT DATE(t.tanggal) AS date_only, t.saldo AS total_saldo
                    FROM transaksi_keuangan t
                    JOIN (
                        SELECT DATE(tanggal) AS tanggal, MAX(tanggal) AS last_tanggal
                        FROM transaksi_keuangan
                        WHERE DATE(tanggal) BETWEEN ? AND ?
                        GROUP BY DATE(tanggal)
                    ) latest ON t.tanggal = latest.last_tanggal
                    ORDER BY DATE(t.tanggal);
                ";
        $saldoPerHari = DB::select($query, [$startDate, $endDate]);

        // Convert to collection and key by date only (without time)
        $saldoCollection = collect($saldoPerHari)->keyBy('date_only');

        // Create period for all days in the range (inclusive of end date)
        $period = Carbon::parse($startDate)->daysUntil(Carbon::parse($endDate)->addDay());

        $labels = [];
        $data = [];

        // Populate data for each day
        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');
            $dateFormatted = $date->format('d M'); // Format as day month

            // Highlight today in the label
            $isToday = $dateStr === $today;
            $labels[] = $isToday ? "📅 {$dateFormatted}" : "{$dateFormatted}";

            // Get saldo value or default to 0
            $saldoValue = $saldoCollection->get($dateStr)?->total_saldo ?? 0;
            $data[] = $saldoValue;
        }

        // Sesuaikan judul chart berdasarkan filter yang dipilih
        $dateRange = '';
        if ($this->filterType === 'week') {
            try {
                [$year, $week] = explode('-', $this->selectedWeek ?? now()->format('Y-W'));
                $weekStartDate = Carbon::now()->setISODate((int) $year, (int) $week)->startOfWeek(Carbon::MONDAY);
                $weekEndDate = Carbon::now()->setISODate((int) $year, (int) $week)->endOfWeek(Carbon::SUNDAY);
                $dateRange = 'Minggu ' . $week . ' (' . $weekStartDate->format('d M') . ' - ' . $weekEndDate->format('d M') . ')';
            } catch (\Exception $e) {
                $dateRange = 'Minggu Ini';
            }
        } else {
            $startDateFormatted = Carbon::parse($this->startDate)->format('d M Y');
            $endDateFormatted = Carbon::parse($this->endDate)->format('d M Y');
            $dateRange = $startDateFormatted . ' - ' . $endDateFormatted;
        }

        static::$heading = 'Saldo Harian: ' . $dateRange;

        return [
            'datasets' => [
                [
                    'label' => 'Saldo Harian',
                    'data' => $data,
                    'borderColor' => 'rgba(54, 162, 235, 1)',
                    'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                    'fill' => true,
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    // Memperbesar ukuran chart
    protected function getHeight(): int
    {
        return 500; // Meningkatkan tinggi chart menjadi 500px
    }
}

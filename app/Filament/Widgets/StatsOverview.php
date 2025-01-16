<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Product;
use Carbon\Month;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected ?string $heading = 'Analytics';

    protected function getStats(): array
    {
        // Inisialisasi array untuk menghitung produk per hari dalam bulan ini
        $daysInMonth = now()->daysInMonth;
        $dailyCounts = [];

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = now()->startOfMonth()->addDays($day - 1)->toDateString();

            // Debugging tanggal yang digunakan
            // dd($date);

            // Hitung produk yang dibuat pada tanggal tertentu
            $count = Product::whereDate('created_at', $date)->count();
            $dailyCounts[] = $count;
        }

        // Debug hasil dailyCounts
        // dd($dailyCounts);

        $currentMonthCount = Product::where('created_at', '>=', now()->startOfMonth())->count();
        $previousMonthCount = Product::whereBetween('created_at', [
            now()->subMonth()->startOfMonth(),
            now()->subMonth()->endOfMonth(),
        ])->count();

        $difference = $currentMonthCount - $previousMonthCount;
        $description = $difference > 0
            ? "{$difference} increase this month"
            : ($difference < 0
                ? abs($difference) . " decrease this month"
                : "No change this month");

        $descriptionIcon = $difference > 0
            ? 'heroicon-m-arrow-trending-up'
            : ($difference < 0 ? 'heroicon-m-arrow-trending-down' : 'heroicon-m-minus');

        $color = $difference > 0
            ? 'success'
            : ($difference < 0 ? 'danger' : 'secondary');

        return [
            Stat::make('Products In ' . now()->format('F Y'), Product::count())
                ->description($description)
                ->descriptionIcon($descriptionIcon)
                ->color($color)
                ->chart($dailyCounts),
                
            Stat::make('Categories', Category::count())
                ->color('success'),
        ];
    }
}

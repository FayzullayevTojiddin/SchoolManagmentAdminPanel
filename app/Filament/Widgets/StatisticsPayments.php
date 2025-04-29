<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PaymentStudentResource;
use App\Models\Paymentstudent;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatisticsPayments extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Jami to‘lovlar', Paymentstudent::sum('price'))
                ->description('Barcha student to‘lovlari yig‘indisi')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('primary')
                ->url(PaymentStudentResource::getUrl('index')),
            
            Stat::make('Ushbu oydagi to‘lovlar', Paymentstudent::whereMonth('created_at', Carbon::now()->month)
                ->whereYear('created_at', Carbon::now()->year)
                ->sum('price'))
                ->description('Faol oyning to‘lovlari')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('success'),
            
            Stat::make('Ushbu haftadagi to‘lovlar', Paymentstudent::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->sum('price'))
                ->description('Faol haftaning to‘lovlari')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('warning'),
        ];
    }
}

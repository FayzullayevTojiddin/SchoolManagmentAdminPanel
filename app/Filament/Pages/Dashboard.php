<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatisticsPayments;
use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\DashboardOverview;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?array $widgets = [
        StatisticsPayments::class,
    ];

    public function getWidgets(): array
    {
        return [
            DashboardOverview::class,
        ];
    }
}

<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Group;
use App\Models\Course;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends StatsOverviewWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Students', Student::count())
                ->color('success')
                ->icon('heroicon-m-academic-cap'),

            Card::make('Teachers', Teacher::count())
                ->color('primary')
                ->icon('heroicon-m-user-group'),

            Card::make('Courses', Course::count())
                ->color('warning')
                ->icon('heroicon-m-book-open'),

            Card::make('Groups', Group::count())
                ->color('danger')
                ->icon('heroicon-m-user-group'),
        ];
    }
}

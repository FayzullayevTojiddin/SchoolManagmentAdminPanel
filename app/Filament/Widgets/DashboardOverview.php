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
                ->icon('heroicon-m-academic-cap')
                ->url(route('filament.admin.resources.students.index')),

            Card::make('Teachers', Teacher::count())
                ->color('primary')
                ->icon('heroicon-m-user-group')
                ->url(route('filament.admin.resources.teachers.index')),

            Card::make('Courses', Course::count())
                ->color('warning')
                ->icon('heroicon-m-book-open')
                ->url(route('filament.admin.resources.courses.index')),

            Card::make('Groups', Group::count())
                ->color('danger')
                ->icon('heroicon-m-user-group')
                ->url(route('filament.admin.resources.groups.index')),
        ];
    }
}

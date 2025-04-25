<?php

namespace App\Filament\Resources\JoinCourseResource\Pages;

use App\Filament\Resources\JoinCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJoinCourses extends ListRecords
{
    protected static string $resource = JoinCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

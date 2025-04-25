<?php

namespace App\Filament\Resources\JoinCourseResource\Pages;

use App\Filament\Resources\JoinCourseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJoinCourse extends EditRecord
{
    protected static string $resource = JoinCourseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

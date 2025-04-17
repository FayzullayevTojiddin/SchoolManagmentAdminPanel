<?php

namespace App\Filament\Resources\LoginResource\Pages;

use App\Filament\Resources\LoginResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLogin extends EditRecord
{
    protected static string $resource = LoginResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

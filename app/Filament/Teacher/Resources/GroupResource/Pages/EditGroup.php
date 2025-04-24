<?php

namespace App\Filament\Teacher\Resources\GroupResource\Pages;

use App\Filament\Teacher\Resources\GroupResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditGroup extends EditRecord
{
    protected static string $resource = GroupResource::class;

    protected function configureForm(Form $form): Form
    {
        // Faqat readonly qilib beramiz
        return parent::configureForm($form)->disabled();
    }

    protected function getHeaderActions(): array
    {
        return [
            // Actions\DeleteAction::make(),
        ];
    }
}

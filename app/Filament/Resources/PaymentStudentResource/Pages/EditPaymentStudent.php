<?php

namespace App\Filament\Resources\PaymentStudentResource\Pages;

use App\Filament\Resources\PaymentStudentResource;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditPaymentStudent extends EditRecord
{
    protected static string $resource = PaymentStudentResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('login_id')
                    ->relationship('student', 'first_name')->disabled(),
                TextInput::make('price')->numeric(),
                Textarea::make('description')
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

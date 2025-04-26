<?php

namespace App\Filament\Resources\PaymentStudentResource\Pages;

use App\Filament\Resources\PaymentStudentResource;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreatePaymentStudent extends CreateRecord
{

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('login_id')
                    ->relationship('student', 'first_name'),
                TextInput::make('price')->numeric(),
                Textarea::make('description')
            ]);
    }
    
    protected static string $resource = PaymentStudentResource::class;
}

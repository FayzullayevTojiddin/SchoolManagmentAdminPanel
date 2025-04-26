<?php

namespace App\Filament\Resources\PaymentStudentResource\Pages;

use App\Filament\Resources\PaymentStudentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPaymentStudents extends ListRecords
{
    protected static string $resource = PaymentStudentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

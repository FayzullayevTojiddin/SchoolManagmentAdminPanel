<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentStudentResource\Pages;
use App\Filament\Resources\PaymentStudentResource\RelationManagers;
use App\Models\PaymentStudent;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentStudentResource extends Resource
{
    protected static ?string $model = PaymentStudent::class;

    protected static ?string $navigationLabel = "To'lovlar";
    protected static ?string $pluralModelLabel = "To'lovlar";

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('login_id')
                    ->relationship('student', 'first_name')->disabled(),
                TextInput::make('price')->numeric(),
                Textarea::make('description')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('student.first_name'),
                TextColumn::make('price')->label("To'lov qiymati"),
                TextColumn::make('created_at')->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentStudents::route('/'),
            'create' => Pages\CreatePaymentStudent::route('/create'),
            // 'edit' => Pages\EditPaymentStudent::route('/{record}/edit'),
        ];
    }
}

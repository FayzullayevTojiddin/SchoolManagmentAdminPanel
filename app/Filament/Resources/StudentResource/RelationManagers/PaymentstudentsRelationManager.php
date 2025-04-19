<?php

namespace App\Filament\Resources\StudentResource\RelationManagers;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaymentstudentsRelationManager extends RelationManager
{
    protected static string $relationship = 'paymentstudents';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('price')
                    ->required()
                    ->maxLength(255)
                    ->numeric(),
                    
                Textarea::make('description')
                    ->required()
                    ->maxLength(1000),

                DatePicker::make('created_at')
                    ->required()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('price'),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->formatStateUsing(fn ($state) => Carbon::createFromTimestamp($state)->format('Y-m-d H:i'))
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

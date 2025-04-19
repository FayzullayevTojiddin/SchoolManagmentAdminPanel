<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeachersRelationManager extends RelationManager
{
    protected static string $relationship = 'teachers';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('teacher_id')
                    ->relationship('teacher', 'full_name')
                    ->preload()
                    ->required()
                    ->searchable()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('teacher.full_name')
            ->columns([
                Tables\Columns\TextColumn::make('teacher.full_name'),
                TextColumn::make('teacher.subject'),
                TextColumn::make('teacher.school')
            ])
            ->searchable()
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('O‘qituvchini biriktirish'),
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

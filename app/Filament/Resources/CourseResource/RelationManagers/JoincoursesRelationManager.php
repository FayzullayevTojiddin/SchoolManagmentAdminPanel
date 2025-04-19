<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JoincoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'joincourses';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public function table(Table $table): Table
{
    return $table
            ->recordTitleAttribute('telegram_user.first_name')
            ->columns([
                Tables\Columns\TextColumn::make('telegram_user.first_name')
                    ->label('Foydalanuvchi'),
                TextColumn::make('created_at')
                    ->label('Created At')
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}

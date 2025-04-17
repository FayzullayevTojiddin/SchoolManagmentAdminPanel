<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Models\Teacher;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Teachers';
    protected static ?string $navigationGroup = 'Education';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('full_name')->required()->maxLength(255),
                TextInput::make('phone_number')->required()->tel(),
                TextInput::make('telegram')->required()->maxLength(255),
                TextInput::make('subject')->required(),
                TextInput::make('experience'),
                TextInput::make('school'),
                TextInput::make('achievements'),
                TextInput::make('feedback'),
                TextInput::make('description'),
                TextInput::make('login_id')->numeric()->nullable(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')->searchable()->sortable(),
                TextColumn::make('phone_number')->searchable(),
                TextColumn::make('subject')->sortable(),
                TextColumn::make('experience')->label('Experience'),
                TextColumn::make('created_at')->since()->label('Created'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }
}
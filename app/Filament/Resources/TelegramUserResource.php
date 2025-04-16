<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TelegramUserResource\Pages;
use App\Models\Login;
use App\Models\TelegramUser;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\DatePicker;
use Filament\Infolists\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section as ComponentsSection;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
class TelegramUserResource extends Resource
{
    protected static ?string $model = TelegramUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
    ->schema([
        TextInput::make('user_id')
            ->label('Telegram User ID')
            ->numeric()
            ->required()
            ->unique(ignoreRecord: true),

        TextInput::make('first_name')
            ->label('Ismi')
            ->required(),

        TextInput::make('last_name')
            ->label('Familiyasi')
            ->nullable(),

        TextInput::make('username')
            ->label('Telegram username')
            ->prefix('@')
            ->maxLength(100)
            ->nullable(),

        Select::make('role')
            ->options([
                'teacher' => "Teacher",
                'student' => "Student",
                'admin' => "Admin",
                'guest' => "None"
            ])

    ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('first_name'),
                TextColumn::make('last_name'),
                TextColumn::make('username'),
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
            Login::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTelegramUsers::route('/'),
            // 'create' => Pages\CreateTelegramUser::route('/create'),
            'edit' => Pages\EditTelegramUser::route('/{record}/edit'),
        ];
    }
}

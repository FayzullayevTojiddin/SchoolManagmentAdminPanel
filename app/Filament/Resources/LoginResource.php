<?php
namespace App\Filament\Resources;

use App\Filament\Resources\LoginResource\Pages;
use App\Models\Login;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;

class LoginResource extends Resource
{
    protected static ?string $model = Login::class;

    protected static ?string $navigationIcon = 'heroicon-o-lock-closed';
    protected static ?string $navigationLabel = 'Loginlar';
    protected static ?string $pluralModelLabel = 'Loginlar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('login')
                    ->label('Login')
                    ->maxLength(30)
                    ->required(),

                TextInput::make('password')
                    ->label('Parol')
                    ->maxLength(50)
                    ->required()
                    ->password(),

                Select::make('role')
                    ->required()
                    ->options([
                        'teacher' => "Teacher",
                        'student' => "Student",
                        'admin' => "Admin"
                    ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->label('ID'),
                TextColumn::make('login')->label('Login'),
                TextColumn::make('role')->label('Rol'),
                TextColumn::make('created_at')
                    ->label('Yaratilgan vaqt')
                    ->dateTime('Y-m-d H:i:s'),
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
            'index' => Pages\ListLogins::route('/'),
            // 'create' => Pages\CreateStudent::route('/create'),
            // 'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
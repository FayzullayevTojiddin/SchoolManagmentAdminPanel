<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JoinCourseResource\Pages;
use App\Filament\Resources\JoinCourseResource\RelationManagers;
use App\Models\JoinCourse;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JoinCourseResource extends Resource
{
    protected static ?string $model = JoinCourse::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = 'Engagement & Feedback';

    public static function canCreate(): bool
    {
        return false;
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('course')->disabled()->relationship('course', 'name'),
                Section::make('Telegram User')
                    ->schema([
                        Select::make('telegram_user.id')->disabled()->relationship('telegram_user', 'full_name')->label('Ism Sharifi'),
                        Select::make('telegram_user.id')->disabled()->relationship('telegram_user', 'phoneNumber')->label('Telefon raqami'),
                        Select::make('telegram_user.age')->disabled()->relationship('telegram_user', 'age')->label('Yoshi'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('telegram_user.first_name'),
                TextColumn::make('created_at')->label('Yuborilgan vaqti'),
                TextColumn::make('course.name')->label('Kurs')
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
            'index' => Pages\ListJoinCourses::route('/'),
            'create' => Pages\CreateJoinCourse::route('/create'),
            // 'edit' => Pages\EditJoinCourse::route('/{record}/edit'),
        ];
    }
}

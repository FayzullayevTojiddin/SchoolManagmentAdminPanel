<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JoinCourseResource\Pages;
use App\Filament\Resources\JoinCourseResource\RelationManagers;
use App\Models\JoinCourse;
use Filament\Forms;
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

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('telegram_user.first_name')
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

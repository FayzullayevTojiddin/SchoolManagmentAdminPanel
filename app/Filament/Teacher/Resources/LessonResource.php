<?php

namespace App\Filament\Teacher\Resources;

use App\Filament\Teacher\Resources\LessonResource\Pages;
use App\Filament\Teacher\Resources\LessonResource\RelationManagers;
use App\Filament\Teacher\Resources\LessonResource\RelationManagers\AttendancesRelationManager;
use App\Filament\Teacher\Resources\LessonResource\RelationManagers\GradesRelationManager;
use App\Models\Lesson;
use App\Models\Student;
use Auth;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LessonResource extends Resource
{
    protected static ?string $model = Lesson::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    protected static ?string $navigationGroup = 'This is';

    public static function getEloquentQuery(): Builder
    {
        $user = Auth::user();
        return parent::getEloquentQuery()
            ->whereHas('group', function ($query) use ($user) {
                $query->where('teacher_id', $user->login->teacher->id);
            })
            ->latest();
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('topic'),
                IconColumn::make('completed')
                    ->boolean()
                    ->label("O'tilgan"),
                TextColumn::make('start')
                    ->label('Boshlanadi')
                    ->dateTime(),
                TextColumn::make('end')
                    ->label('Tugash vaqti')
                    ->dateTime()
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // GradesRelationManager::class,
            // AttendancesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLessons::route('/'),
            'create' => Pages\CreateLesson::route('/create'),
            // 'edit' => Pages\EditLesson::route('/{record}/edit'),
        ];
    }
}

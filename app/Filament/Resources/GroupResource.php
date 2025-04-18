<?php
namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\RelationManagers\StudentsRelationManager;
use App\Filament\Resources\GroupResource\Pages;
use App\Filament\Resources\GroupResource\RelationManagers\HomeworksRelationManager;
use App\Filament\Resources\GroupResource\RelationManagers\MaterialsRelationManager;
use App\Models\Group;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class GroupResource extends Resource
{
    protected static ?string $model = Group::class;

    protected static ?string $navigationGroup = 'Education';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel = 'Groups';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('teacher_id')
                    ->relationship('teacher', 'full_name')
                    ->required()
                    ->searchable(),

                Select::make('course_id')
                    ->relationship('course', 'name')
                    ->required()
                    ->searchable(),

                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable(),
                TextColumn::make('teacher.full_name')->label('Teacher'),
                TextColumn::make('course.name')->label('Course'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            StudentsRelationManager::class,
            HomeworksRelationManager::class,
            MaterialsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGroups::route('/'),
            'create' => Pages\CreateGroup::route('/create'),
            'edit' => Pages\EditGroup::route('/{record}/edit'),
        ];
    }
}
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassResource\RelationManagers\GroupsRelationManager;
use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers\JoincoursesRelationManager;
use App\Filament\Resources\CourseResource\RelationManagers\StudentsRelationManager;
use App\Filament\Resources\CourseResource\RelationManagers\TeachersRelationManager;
use App\Models\Course;
use Filament\Forms\Components\{Repeater, Section, TextInput, Textarea, Toggle};
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\{TextColumn, IconColumn};

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationGroup = 'Education';

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Courses';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Course datas')
                ->schema([
                        TextInput::make('name')
                        ->label('Course Name')
                        ->required()
                        ->unique(ignoreRecord: true),

                    Textarea::make('description')
                        ->label('Description')
                        ->required()
                        ->rows(5),

                    TextInput::make('price')
                        ->label('Price')
                        ->numeric()
                        ->required(),

                    TextInput::make('duration')
                        ->label('Duration')
                        ->placeholder('e.g. 6 weeks, 2 months')
                        ->required(),

                    Toggle::make('status')
                        ->label('Active Status')
                        ->inline(false),
                ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('price')->money('usd', true),
                TextColumn::make('duration'),
                IconColumn::make('status')
                    ->boolean()
                    ->label('Active'),
            ])
            ->defaultSort('id', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            GroupsRelationManager::class,
            JoincoursesRelationManager::class,
            TeachersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }
}

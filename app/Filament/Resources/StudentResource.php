<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClassResource\RelationManagers\GroupsRelationManager;
use App\Filament\Resources\StudentResource\Pages;
use App\Filament\Resources\StudentResource\RelationManagers\PaymentstudentsRelationManager;
use App\Models\Student;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Students';
    protected static ?string $pluralModelLabel = 'Students';
    protected static ?string $modelLabel = 'Student';
    protected static ?string $navigationGroup = 'Education';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Student about')
                    ->schema([
                        TextInput::make('first_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('last_name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('father_name')
                            ->required()
                            ->maxLength(255),
                        DatePicker::make('birthday')
                            ->required(),
                        Textarea::make('description')
                            ->maxLength(65535),
                        Toggle::make('status')
                            ->label('Is Active')
                            ->default(true),
                    ])
                    ->collapsible(),

                Section::make("Login Section")
                    ->schema([
                        BelongsToSelect::make('login_id')
                            ->relationship('login', 'login')
                            ->searchable()
                            ->preload()
                            ->label('Login')
                            ->required()
                            ->createOptionForm([
                                TextInput::make('login')
                                    ->required()
                                    ->unique(ignoreRecord: true),
                                TextInput::make('password')
                                    ->password()
                                    ->required()
                                    ->minLength(6),
                                Select::make('role')
                                    ->required()
                                    ->options([
                                        'student' => "Student",
                                        'teacher' => "Teacher",
                                        'admin' => "Admin",
                                        'guest' => "None"
                                    ])
                            ]),
                        ]),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('first_name')->searchable()->sortable(),
                TextColumn::make('last_name')->searchable()->sortable(),
                TextColumn::make('father_name')->sortable(),
                TextColumn::make('birthday')->date(),
                BooleanColumn::make('status')->label('Active'),
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

    public static function getRelations(): array
    {
        return [
            PaymentstudentsRelationManager::class,
            GroupsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
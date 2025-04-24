<?php

namespace App\Filament\Resources\LessonResource\Pages;

use App\Filament\Resources\LessonResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLesson extends CreateRecord
{
    protected static string $resource = LessonResource::class;

    protected function afterCreate(): void
    {
        $group = $this->record->group;
        $students = $group->students;
            
        // Attendance yaratish
        foreach ($students as $student) {
            $this->record->attendances()->create([
                'student_id' => $student->id,
                'status' => null,
                'comment' => null,
            ]);
    
            $this->record->grades()->create([
                'student_id' => $student->id,
                'score' => null,
                'comment' => null,
            ]);
        }
    }
}

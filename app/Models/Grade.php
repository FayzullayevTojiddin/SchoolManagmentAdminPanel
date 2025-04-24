<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
        'lesson_id',
        'student_id',
        'score',
        'comment'
    ];

    public function lesson()
    {
        return $this->hasOne(Lesson::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}

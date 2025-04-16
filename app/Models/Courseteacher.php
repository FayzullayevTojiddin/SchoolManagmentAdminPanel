<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Courseteacher
 * 
 * @property int $id
 * @property int $created_at
 * @property int $course_id
 * @property int $teacher_id
 * 
 * @property Course $course
 * @property Teacher $teacher
 *
 * @package App\Models
 */
class Courseteacher extends Model
{
	protected $table = 'courseteacher';
	public $timestamps = false;

	protected $casts = [
		'course_id' => 'int',
		'teacher_id' => 'int'
	];

	protected $fillable = [
		'course_id',
		'teacher_id'
	];

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}
}

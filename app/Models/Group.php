<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property int|null $teacher_id
 * @property int|null $course_id
 * @property string $name
 * 
 * @property Teacher|null $teacher
 * @property Course|null $course
 * @property Collection|Student[] $students
 * @property Collection|Homework[] $homework
 * @property Collection|Material[] $materials
 *
 * @package App\Models
 */
class Group extends Model
{
	protected $casts = [
		'teacher_id' => 'int',
		'course_id' => 'int'
	];

	protected $fillable = [
		'teacher_id',
		'course_id',
		'name'
	];

	public function teacher()
	{
		return $this->belongsTo(Teacher::class);
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}

	public function students()
	{
		return $this->hasMany(Groupstudent::class);
	}

	public function homeworks()
	{
		return $this->hasMany(Homework::class);
	}

	public function materials()
	{
		return $this->hasMany(Material::class);
	}
}

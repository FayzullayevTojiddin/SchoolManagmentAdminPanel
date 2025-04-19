<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Groupstudent
 * 
 * @property int $id
 * @property int $student_id
 * @property int $group_id
 * @property int $created_at
 * 
 * @property Student $student
 * @property Group $group
 *
 * @package App\Models
 */
class Groupstudent extends Model
{
	protected $table = 'groupstudent';
	public $timestamps = false;

	protected $casts = [
		'student_id' => 'int',
		'group_id' => 'int'
	];

	protected $fillable = [
		'student_id',
		'group_id'
	];

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function group()
	{
		return $this->belongsTo(Group::class);
	}
}

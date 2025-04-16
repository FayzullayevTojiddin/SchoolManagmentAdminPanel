<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * 
 * @property int $id
 * @property int $created_at
 * @property string $name
 * @property string $description
 * @property int $price
 * @property string $duration
 * @property bool $status
 * 
 * @property Collection|Teacher[] $teachers
 * @property Collection|Group[] $groups
 * @property Collection|Joincourse[] $joincourses
 *
 * @package App\Models
 */
class Course extends Model
{
	protected $table = 'course';
	public $timestamps = false;

	protected $casts = [
		'price' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'description',
		'price',
		'duration',
		'status'
	];

	public function teachers()
	{
		return $this->belongsToMany(Teacher::class, 'courseteacher')
					->withPivot('id');
	}

	public function groups()
	{
		return $this->hasMany(Group::class);
	}

	public function joincourses()
	{
		return $this->hasMany(Joincourse::class);
	}
}

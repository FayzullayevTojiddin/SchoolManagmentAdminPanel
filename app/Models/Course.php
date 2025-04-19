<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 * 
 * @property int $id
 * @property Carbon $created_at
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
		return $this->hasMany(Courseteacher::class);
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

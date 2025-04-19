<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property string $phone_number
 * @property string $telegram
 * @property string $full_name
 * @property string $subject
 * @property string $experience
 * @property string $school
 * @property string $achievements
 * @property string $feedback
 * @property string $description
 * @property int|null $login_id
 * 
 * @property Login|null $login
 * @property Collection|Course[] $courses
 * @property Collection|Group[] $groups
 *
 * @package App\Models
 */
class Teacher extends Model
{
	protected $table = 'teacher';
	public $timestamps = false;

	protected $casts = [
		'login_id' => 'int'
	];

	protected $fillable = [
		'phone_number',
		'telegram',
		'full_name',
		'subject',
		'experience',
		'school',
		'achievements',
		'feedback',
		'description',
		'login_id'
	];

	public function login()
	{
		return $this->belongsTo(Login::class);
	}

	public function courses()
	{
		return $this->hasMany(Courseteacher::class);
	}

	public function groups()
	{
		return $this->hasMany(Group::class);
	}
}

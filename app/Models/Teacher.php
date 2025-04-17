<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Teacher
 * 
 * @property int $id
 * @property int $created_at
 * @property int $user_id
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
		'user_id' => 'int',
		'login_id' => 'int'
	];

	protected $fillable = [
		'user_id',
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
		return $this->belongsToMany(Course::class, 'courseteacher')
					->withPivot('id');
	}

	public function groups()
	{
		return $this->hasMany(Group::class);
	}

	protected static function booted(): void
	{
		static::creating(function ($model) {
			$model->created_at = time();
		});
	}
}

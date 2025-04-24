<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Login
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property string $login
 * @property string $password
 * @property string $role
 * 
 * @property Collection|Notification[] $notifications
 * @property Collection|Student[] $students
 * @property Collection|Teacher[] $teachers
 * @property Collection|TelegramUser[] $telegram_users
 *
 * @package App\Models
 */
class Login extends Model
{
	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'login',
		'password',
		'role'
	];

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'to_id');
	}

	public function student()
	{
		return $this->belongsTo(Student::class);
	}

	public function teacher()
	{
		return $this->hasOne(Teacher::class);
	}

	public function telegram_user()
	{
		return $this->belongsTo(TelegramUser::class);
	}
}

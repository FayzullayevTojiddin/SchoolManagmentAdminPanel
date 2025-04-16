<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TelegramUser
 * 
 * @property int $id
 * @property int $created_at
 * @property int $user_id
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $username
 * @property string $role
 * @property int|null $login_id
 * 
 * @property Login|null $login
 * @property Collection|Joincourse[] $joincourses
 *
 * @package App\Models
 */
class TelegramUser extends Model
{
	protected $table = 'telegram_user';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'login_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'first_name',
		'last_name',
		'username',
		'role',
		'login_id'
	];

	public function login()
	{
		return $this->belongsTo(Login::class);
	}

	public function joincourses()
	{
		return $this->hasMany(Joincourse::class, 'user_id', 'user_id');
	}

	protected static function booted(): void
	{
		static::creating(function ($model) {
			$model->created_at = time();
		});
	}

}

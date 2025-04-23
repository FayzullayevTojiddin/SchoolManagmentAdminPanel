<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TelegramUser
 * 
 * @property int $id
 * @property Carbon $created_at
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
}

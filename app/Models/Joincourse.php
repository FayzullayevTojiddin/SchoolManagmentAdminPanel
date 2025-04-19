<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Joincourse
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property int $user_id
 * @property int $course_id
 * 
 * @property TelegramUser $telegram_user
 * @property Course $course
 *
 * @package App\Models
 */
class Joincourse extends Model
{
	protected $table = 'joincourse';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'course_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'course_id'
	];

	public function telegram_user()
	{
		return $this->belongsTo(TelegramUser::class, 'user_id', 'user_id');
	}

	public function course()
	{
		return $this->belongsTo(Course::class);
	}
}

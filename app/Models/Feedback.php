<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property int $user_id
 * @property string $question
 *
 * @package App\Models
 */
class Feedback extends Model
{
	protected $table = 'feedbacks';
	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'question'
	];

	public function telegramuser()
	{
		return $this->belongsTo(TelegramUser::class, 'user_id', 'user_id');
	}
}

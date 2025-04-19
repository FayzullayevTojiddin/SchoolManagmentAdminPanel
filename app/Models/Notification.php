<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property int $from_in_id
 * @property int $to_id
 * @property string $message
 * @property bool $hidden
 * @property bool $read
 * 
 * @property Login $login
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notification';
	public $timestamps = false;

	protected $casts = [
		'from_in_id' => 'int',
		'to_id' => 'int',
		'hidden' => 'bool',
		'read' => 'bool'
	];

	protected $fillable = [
		'from_in_id',
		'to_id',
		'message',
		'hidden',
		'read'
	];

	public function login()
	{
		return $this->belongsTo(Login::class, 'to_id');
	}
}

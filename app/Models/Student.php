<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Student
 * 
 * @property int $id
 * @property Carbon $created_at
 * @property string $first_name
 * @property string $last_name
 * @property string $father_name
 * @property Carbon $birthday
 * @property string|null $description
 * @property int|null $login_id
 * @property bool $status
 * 
 * @property Login|null $login
 * @property Collection|Group[] $groups
 * @property Collection|Paymentstudent[] $paymentstudents
 *
 * @package App\Models
 */
class Student extends Model
{
	protected $table = 'student';
	public $timestamps = false;

	protected $casts = [
		'birthday' => 'datetime',
		'login_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'father_name',
		'birthday',
		'description',
		'login_id',
		'status'
	];

	public function login()
	{
		return $this->belongsTo(Login::class);
	}

	public function groups()
	{
		return $this->hasMany(Groupstudent::class);
	}

	public function paymentstudents()
	{
		return $this->hasMany(Paymentstudent::class, 'login_id');
	}
}

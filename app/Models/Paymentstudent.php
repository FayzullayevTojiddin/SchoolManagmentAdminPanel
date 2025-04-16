<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Paymentstudent
 * 
 * @property int $id
 * @property int $created_at
 * @property int|null $login_id
 * @property int $price
 * @property string|null $description
 * 
 * @property Student|null $student
 *
 * @package App\Models
 */
class Paymentstudent extends Model
{
	protected $table = 'paymentstudent';
	public $timestamps = false;

	protected $casts = [
		'login_id' => 'int',
		'price' => 'int'
	];

	protected $fillable = [
		'login_id',
		'price',
		'description'
	];

	public function student()
	{
		return $this->belongsTo(Student::class, 'login_id');
	}
}

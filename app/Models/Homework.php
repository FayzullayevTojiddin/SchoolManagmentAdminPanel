<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Homework
 * 
 * @property int $id
 * @property int $created_at
 * @property int $group_id
 * @property bool $completed
 * @property string $title
 * @property string|null $description
 * 
 * @property Group $group
 *
 * @package App\Models
 */
class Homework extends Model
{
	protected $table = 'homework';
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int',
		'completed' => 'bool'
	];

	protected $fillable = [
		'group_id',
		'completed',
		'title',
		'description'
	];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}

	protected static function booted(): void
	{
		static::creating(function ($model) {
			$model->created_at = time();
			$model->completed = false;
		});
	}
}

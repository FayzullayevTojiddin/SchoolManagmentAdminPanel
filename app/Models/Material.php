<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 * 
 * @property int $id
 * @property int $created_at
 * @property string $name
 * @property string $path
 * @property string $type
 * @property int $group_id
 * 
 * @property Group $group
 *
 * @package App\Models
 */
class Material extends Model
{
	protected $table = 'material';
	public $timestamps = false;

	protected $casts = [
		'group_id' => 'int'
	];

	protected $fillable = [
		'name',
		'path',
		'type',
		'group_id'
	];

	public function group()
	{
		return $this->belongsTo(Group::class);
	}
}

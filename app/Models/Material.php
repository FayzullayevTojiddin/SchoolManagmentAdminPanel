<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Material
 * 
 * @property int $id
 * @property Carbon $created_at
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

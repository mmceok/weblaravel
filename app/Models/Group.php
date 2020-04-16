<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * 
 * @property int $id
 * @property string $name
 * @property string $code
 * @property int $time
 *
 * @package App\Models
 */
class Group extends Model
{
	protected $table = 'group';
	public $timestamps = false;

	protected $casts = [
		'time' => 'int'
	];

	protected $fillable = [
		'name',
		'code',
		'time'
	];
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property string $ID_Rol
 * @property string $Rol
 * @property int $Estado_Rol
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';
	protected $primaryKey = 'ID_Rol';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Estado_Rol' => 'int'
	];

	protected $fillable = [
		'Rol',
		'Estado_Rol'
	];
}

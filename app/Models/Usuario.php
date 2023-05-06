<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property string $ID_Usuario
 * @property string $Nombre_Usuario
 * @property string $Contraseña_Usuario
 * @property string $Correo_Usuario
 * @property Carbon $Fecha_Nacimiento_Usuario
 * @property string $Identificacion_Usuario
 * @property int $Estado_Usuario
 * @property string $ID_Rol
 * @property string|null $ID_Empresa
 * 
 * @property Role $role
 * @property Empresa|null $empresa
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */
class Usuario extends Model
{
	protected $table = 'usuario';
	protected $primaryKey = 'ID_Usuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Fecha_Nacimiento_Usuario' => 'datetime',
		'Estado_Usuario' => 'int'
	];

	protected $fillable = [
		'Nombre_Usuario',
		'Contraseña_Usuario',
		'Correo_Usuario',
		'Fecha_Nacimiento_Usuario',
		'Identificacion_Usuario',
		'Estado_Usuario',
		'ID_Rol',
		'ID_Empresa'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'ID_Rol');
	}

	public function empresa()
	{
		return $this->belongsTo(Empresa::class, 'ID_Empresa');
	}

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'ID_Usuario');
	}
}

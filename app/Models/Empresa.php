<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Empresa
 * 
 * @property string $ID_Empresa
 * @property string $Nombre_Empresa
 * @property string $Rubro_Empresa
 * @property float $Comision_Empresa
 * @property int $Estado_Empresa
 * @property Carbon $Fecha_Creacion_Empresa
 * @property string|null $img_empresa
 * 
 * @property Collection|Cupon[] $cupons
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Empresa extends Model
{
	protected $table = 'empresa';
	protected $primaryKey = 'ID_Empresa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Comision_Empresa' => 'float',
		'Estado_Empresa' => 'int',
		'Fecha_Creacion_Empresa' => 'datetime'
	];

	protected $fillable = [
		'Nombre_Empresa',
		'Rubro_Empresa',
		'Comision_Empresa',
		'Estado_Empresa',
		'Fecha_Creacion_Empresa',
		'img_empresa'
	];

	public function cupons()
	{
		return $this->hasMany(Cupon::class, 'ID_Empresa');
	}

	public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'ID_Empresa');
	}
}

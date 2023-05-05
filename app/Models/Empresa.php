<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
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
		'Fecha_Creacion_Empresa'
	];
}

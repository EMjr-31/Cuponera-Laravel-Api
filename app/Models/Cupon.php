<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cupon
 * 
 * @property string $ID_Cupon
 * @property string $Titulo_Cupon
 * @property float $Precio_Regular_Cupon
 * @property float $Precio_Oferta_Cupon
 * @property Carbon $Fecha_Inicio_Oferta_Cupon
 * @property Carbon $Fecha_Fin_Oferta_Cupon
 * @property Carbon $Fecha_Limite_Cupon
 * @property string $Descripcion_Cupon
 * @property int $Cantidad_Cupon
 * @property int $Estado_Cupon
 * @property string $ID_Empresa
 * @property string $Img
 * 
 * @property Empresa $empresa
 * @property Collection|Venta[] $ventas
 *
 * @package App\Models
 */
class Cupon extends Model
{
	protected $table = 'cupon';
	protected $primaryKey = 'ID_Cupon';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Precio_Regular_Cupon' => 'float',
		'Precio_Oferta_Cupon' => 'float',
		'Fecha_Inicio_Oferta_Cupon' => 'datetime',
		'Fecha_Fin_Oferta_Cupon' => 'datetime',
		'Fecha_Limite_Cupon' => 'datetime',
		'Cantidad_Cupon' => 'int',
		'Estado_Cupon' => 'int'
	];

	protected $fillable = [
		'Titulo_Cupon',
		'Precio_Regular_Cupon',
		'Precio_Oferta_Cupon',
		'Fecha_Inicio_Oferta_Cupon',
		'Fecha_Fin_Oferta_Cupon',
		'Fecha_Limite_Cupon',
		'Descripcion_Cupon',
		'Cantidad_Cupon',
		'Estado_Cupon',
		'ID_Empresa',
		'Img'
	];

	public function empresa()
	{
		return $this->belongsTo(Empresa::class, 'ID_Empresa');
	}

	public function ventas()
	{
		return $this->hasMany(Venta::class, 'ID_Cupon');
	}
}

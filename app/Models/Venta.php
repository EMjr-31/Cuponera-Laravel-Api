<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 * 
 * @property string $ID_Venta
 * @property string $ID_Cupon
 * @property string $ID_Usuario
 * @property Carbon $Fecha_Compra_Venta
 * @property int $Estado_Pago_Venta
 * @property int $Estado_Canje_Venta
 * @property Carbon $Fecha_Canje_Venta
 * 
 * @property Cupon $cupon
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class Venta extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = 'ID_Venta';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'Fecha_Compra_Venta' => 'datetime',
		'Estado_Pago_Venta' => 'int',
		'Estado_Canje_Venta' => 'int',
		'Fecha_Canje_Venta' => 'datetime'
	];

	protected $fillable = [
		'ID_Cupon',
		'ID_Usuario',
		'Fecha_Compra_Venta',
		'Estado_Pago_Venta',
		'Estado_Canje_Venta',
		'Fecha_Canje_Venta'
	];

	public function cupon()
	{
		return $this->belongsTo(Cupon::class, 'ID_Cupon');
	}

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'ID_Usuario');
	}
}

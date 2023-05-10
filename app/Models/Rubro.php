<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubro
 * 
 * @property int $id_rubro
 * @property string $nombre_rubro
 *
 * @package App\Models
 */
class Rubro extends Model
{
	protected $table = 'rubros';
	protected $primaryKey = 'id_rubro';
	public $timestamps = false;

	protected $fillable = [
		'nombre_rubro'
	];
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Class Usuario
 * 
 * @property string $id
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
class Usuario extends Authenticatable implements JWTSubject
{
	use HasApiTokens, HasFactory, Notifiable; 
	
	protected $table = 'usuario';
	protected $primaryKey = 'id';
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

	use Notifiable;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
	}
    
}
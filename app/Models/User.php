<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table="usuario";

    protected $fillable = [ 
        'id',
        'Nombre_Usuario',
        'Contraseña_Usuario',
        'Correo_Usuario',
        'Fecha_Nacimiento_Usuario',
        'Identificacion_Usuario',
        'Estado_Usuario',
        'ID_Rol',
        'ID_Empresa'
    ];

    public $timestamps=false;

}

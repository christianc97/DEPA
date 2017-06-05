<?php

namespace reportes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   protected $connection = 'reportesmensajeros';
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombre1','nombre2','apellido1','apellido2','area','fecha_nacimiento',
        'genero','telefono','celular','direccion','email','eps','afp','correo_corporativo',
        'fecha_ingreso','fecha_finalizacion_contrato','activo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

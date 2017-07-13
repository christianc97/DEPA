<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $connection = 'reportesmensajeros';
    protected $table = 'equipos';
    protected $primaryKey = 'id_equipos';
    public $timesstamps = false;
    protected $fillable = [
        'codigo',
        'tipo',
        'marca',
        'modelo',
        'serial',
        'os_original',
        'os_instalado',
        'os_licenciado',
        'procesador',
        'arquitectura',
        'capacidad_ram',
        'tipo_ram',
        'tamapaño_ram',
        'capacidad_hdd',
        'tipo_hdd',
        'tamaño_hdd',
        'conector_hdd',
        'video_integrada',
        'video_externa',
        'red_fisica',
        'red_wireless',
        'bluetooth',
        'pantalla_pulgadas',
        'tactil',
        'camara',
        'parlantes',
        'microfono',
        'unidad_cd',
        'password',
    ];
}

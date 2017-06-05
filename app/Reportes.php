<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    protected $connection = 'reportesmensajeros';
    
    protected $table = 'log_reporte';
    protected $primaryKey = 'id_registro';
    public $timesstamps = false;
    protected $fillable=[
        'id_mensajero',
        'id_empresa',
        'estado_mensajero',
        'estado_servicio',
        'tipo_pago',
        'fecha_inicio',
        'hora_inicio',
        'fecha_fin',
        'hora_fin',
        'user_id',
        'tipo_reporte_id',
        
     ];

}

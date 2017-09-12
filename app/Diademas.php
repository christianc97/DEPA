<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class Diademas extends Model
{
    protected $connection = 'reportesmensajeros';
    protected $table = 'diademas';
    protected $primaryKey = 'id_diadema';
    public $timesstamps = false;
    protected $fillable = [
        'codigo_d',
        'fecha_compra',
    ];
}

<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class Diademas extends Model
{
    protected $connection = 'reportesmensajeros';
    protected $table = 'diademas';
    protected $primaryKey = 'id_diademas';
    public $timesstamps = false;
    protected $fillable = [
        'codigo',
        'fecha_compra',
    ];
}

<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class gruposelite extends Model
{
    //
    protected $connection = 'reportesmensajeros';
    protected $table = 'grupoelite_puntos';
    protected $primaryKey = 'id';
    public $timesstamps = false;
}

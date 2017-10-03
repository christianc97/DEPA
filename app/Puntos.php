<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class Puntos extends Model
{
    protected $connection = 'mu_domicilios';
    protected $table = 'puntos';
    protected $primaryKey = 'id';
    public $timesstamps = false;
  
}

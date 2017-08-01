<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $connection = 'mu_domicilios';
    protected $table = 'empresa';
    protected $primaryKey = 'id';
    public $timesstamps = false;
}

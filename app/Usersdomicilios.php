<?php

namespace reportes;

use Illuminate\Database\Eloquent\Model;

class Usersdomicilios extends Model
{
    protected $connection = 'mu_domicilios';
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $timesstamps = false;
}

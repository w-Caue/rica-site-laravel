<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RicaClientes extends Authenticatable
{
    protected $connection = 'sistema';
    protected $guard = 'rica';

    protected $table = 'CLIENTES';
    protected $primaryKey = 'CODIGO';
    public $timestamps = false;
    public $incrementing = false;
}
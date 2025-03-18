<?php

namespace App\Models\Rcfin;

use Illuminate\Database\Eloquent\Model;

class Contas extends Model
{
    protected $connection = 'rcfin';
    protected $table = 'CRC_CP';
    protected $primaryKey = 'COD_SEQ';
    // protected $fillable = ['name', 'connection', 'prefix'];
    public $timestamps = false;
    public $incrementing = false;
}

<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class TicketClassificacao extends Model
{
    protected $connection = 'helpdesk';
    protected $table = 'CLASSIFICACAO';
    protected $primaryKey = 'ID';
    protected $fillable = ['name', 'connection', 'prefix'];
    public $timestamps = false;
    public $incrementing = false;
}

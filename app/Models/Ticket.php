<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $connection = 'helpdesk';
    protected $table = 'TICKET';
    protected $primaryKey = 'ID';
    protected $fillable = ['name', 'connection', 'prefix'];
    public $timestamps = false;
    public $incrementing = false;

    function mensagens()
    {
        return $this->hasMany('App\Models\Ticket\TicketMensagem', 'TICKET_ID', 'ID')
            ->get();
    }

    public function operador()
    {
        return $this->hasOne('App\Models\Ticket\Operador', 'ID', 'OPERADOR_ATUAL')->get()->first();
    }

    public function classificacao()
    {
        return $this->hasOne('App\Models\Ticket\TicketClassificacao', 'ID', 'CLASSIFICACAO_ID')->get()->first();
    }

    public function local()
    {
        return $this->hasOne('App\Models\Ticket\TicketLocal', 'ID', 'LOCAL_ID')->get()->first();
    }
}

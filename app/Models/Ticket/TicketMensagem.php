<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class TicketMensagem extends Model
{
    protected $connection = 'helpdesk';
    protected $table = 'TICKET_MENSAGEM';
    protected $primaryKey = 'ID';
    protected $fillable = ['name', 'connection', 'prefix'];
    public $timestamps = false;
    public $incrementing = false;


    function operador()
    {
        return $this->hasOne('App\Models\Ticket\Operador', 'ID', 'OPERADOR_ATUAL')
            ->get()
            ->first();
    }

    function anexo()
    {
        // if ($this->ANEXO_ID != null)
        return $this->hasOne('App\Models\Ticket\TicketAnexo', 'ID', 'ANEXO_ID')
            ->get()
            ->first();
    }
}

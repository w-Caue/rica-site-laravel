<?php

namespace App\Models\Ticket;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class Operador extends Model
{
    protected $connection = 'helpdesk';
    protected $table = 'OPERADOR';
    protected $primaryKey = 'ID';
    protected $fillable = ['name', 'connection', 'prefix'];
    public $timestamps = false;
    public $incrementing = false;


    public function ultimoAtendimento()
    {
        return Ticket::where('OPERADOR_ATUAL', '=', $this->ID)
            ->whereIn('TICKET.TIPO', ['T', 'W', 'X'])
            ->orderBy('ID', 'DESC')
            ->first();
    }
}

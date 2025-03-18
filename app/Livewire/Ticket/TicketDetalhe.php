<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class TicketDetalhe extends Component
{
    public $codigoTicket;

    public $ticket;

    public $readyToLoad = false;

    public $listeners = [
        'dados'
    ];

    public function load()
    {
        $this->readyToLoad = true;
    }

    public function dados($codigo)
    {
        $codigoTicket = $codigo;

        $this->ticket = Ticket::select(
            'TICKET.*',
            'OPERADOR.NOME',
        )
            ->leftJoin('OPERADOR', 'OPERADOR.ID', '=', 'TICKET.OPERADOR_ATUAL')
            ->where('TICKET.ID', '=', $codigoTicket)
            ->first();
    }
    
    public function render()
    {
        return view('livewire.ticket.ticket-detalhe');
    }
}

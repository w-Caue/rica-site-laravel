<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Lazy;
use Livewire\Component;

class TicketList extends Component
{
    public $sortField = 'ID';
    public $sortAsc = true;

    public $search;

    public $filterStatus = 'A';

    public $porPagina = '5';

    public $readyToLoad = false;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function load()
    {
        $this->readyToLoad = true;
    }

    public function dados()
    {
        $codRica =  Auth::user()->CODIGO_RCFIN;

        $tickets = Ticket::where('CLIENTE_CODIGO', $codRica)
            ->where('TIPO', 'K')

            // Pesquisas da tabela
            ->when(!empty($this->search), function ($query) {
                $string = strtoupper($this->search);
                $string  = str_replace(" ", "%", $string);
                return $query->where($this->sortField, 'LIKE', "%$string%");
            })

            ->when($this->filterStatus, function ($query) {
                return $query->where('STATUS', $this->filterStatus);
            })

            ->orderBy($this->sortField, $this->sortAsc ? 'DESC' : 'ASC')

            ->paginate($this->porPagina);

        return $tickets;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.ticket.ticket-list', ['tickets' => $this->dados()]);
    }
}

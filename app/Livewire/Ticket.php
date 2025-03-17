<?php

namespace App\Livewire;

use App\Models\Ticket as ModelsTicket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class Ticket extends Component
{
    use WithPagination;

    public $sortField = 'ID';
    public $sortAsc = true;

    public $search;

    public $filterStatus;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function dados()
    {
        $codRica =  Auth::user()->CODIGO_RCFIN;

        $tickets = ModelsTicket::where('CLIENTE_CODIGO', $codRica)
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

            ->paginate(5);

        return $tickets;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.ticket', ['tickets' => $this->dados()]);
    }
}

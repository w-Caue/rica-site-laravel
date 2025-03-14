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

    public $sortField = 'CODIGO';
    public $sortAsc = true;

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

        $tickets = ModelsTicket::where('CLIENTE_CODIGO', $codRica)->paginate(5);

        // dd($tickets);
        
        return $tickets;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.ticket', ['tickets' => $this->dados()]);
    }
}

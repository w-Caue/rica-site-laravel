<?php

namespace App\Livewire;

use App\Models\Rcfin\Contas;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public $codRica;

    public function mount()
    {
        $this->codRica = Auth::user()->CODIGO_RCFIN;
    }

    public function ticket()
    {
        $ticket = Ticket::orderBy('ID', 'DESC')
            ->where('CLIENTE_CODIGO', $this->codRica)
            ->where('TIPO', 'K')
            ->first();

        return $ticket;
    }

    public function conta()
    {
        $contas = Contas::orderBy('N_DOCUMENTO')
            ->where('CLIENTE', $this->codRica)
            ->where('SALDO_DEVEDOR', '0')
            ->first();

        return $contas;
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard', ['ticket' => $this->ticket(), 'conta' => $this->conta()]);
    }
}

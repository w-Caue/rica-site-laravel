<?php

namespace App\Livewire;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public function ticket()
    {
        $codRica =  Auth::user()->CODIGO_RCFIN;

        $ticket = Ticket::orderBy('ID', 'DESC')
            ->where('CLIENTE_CODIGO', $codRica)
            ->where('TIPO', 'K')
            ->first();

        return $ticket;
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard', ['ticket' => $this->ticket()]);
    }
}

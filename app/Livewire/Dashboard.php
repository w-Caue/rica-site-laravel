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

    public $dataAtual;

    public function mount()
    {
        $this->codRica = Auth::user()->CODIGO_RCFIN;
        $this->dataAtual = date('Y-m-d');
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
        $contas = Contas::select(
            'CRC_CP.COD_SEQ',
            'CRC_CP.CLIENTE',
            'CLIENTES.CNPJ',
            'CRC_CP.N_DOCUMENTO',
            'CRC_CP.DT_VENCIMENTO',
            'CRC_CP.VL_DOCUMENTO',
            'CRC_CP.N_PARCELA',
            'CRC_CP.HISTORICO',
            'CRC_CP.SALDO_DEVEDOR',
            'AGENTES.TIPO as AGENTE_TIPO',
        )
            ->leftJoin('CLIENTES', 'CRC_CP.CLIENTE', '=', 'CLIENTES.CODIGO')
            ->leftJoin('AGENTES', 'CRC_CP.AG_COBRADOR', 'AGENTES.CODAGENTE')

            ->where('CRC_CP.TIPO', '=', 'R')
            ->where('CRC_CP.SALDO_DEVEDOR', '>', 0)
            ->where('CLIENTES.CNPJ', '=', Auth::user()->CNPJ)
            ->where('CRC_CP.DELETADO', '=', 0)

            ->where(function ($query) {
                $query
                    ->where('SOMA_FLAG', '<>', 'S')
                    ->orWhere('SOMA_FLAG', '=', null);
            })

            ->orderBy('CRC_CP.DT_VENCIMENTO', 'DESC')
            ->get();

        return $contas;
    }


    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard', [
            'ticket' => $this->ticket(),
            'contas' => $this->conta()
        ]);
    }
}

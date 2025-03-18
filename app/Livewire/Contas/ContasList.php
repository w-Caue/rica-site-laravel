<?php

namespace App\Livewire\Contas;

use App\Models\Rcfin\Contas;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ContasList extends Component
{
    public $sortField = 'ID';
    public $sortAsc = true;

    public $search;

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
        $clienteCnpj =  Auth::user()->CNPJ;

        $contas = Contas::select(
            'CRC_CP.COD_SEQ',
            'CRC_CP.TIPO',
            'CRC_CP.VENDA',
            'CRC_CP.CLIENTE',
            'CLIENTES.CNPJ',
            'CLIENTES.NOME as NOME_CLIENTE',
            'CRC_CP.N_DOCUMENTO',
            'CRC_CP.DT_VENCIMENTO',
            'CRC_CP.VL_DOCUMENTO',
            'CRC_CP.N_PARCELA',
            'CRC_CP.HISTORICO',
            'AGENTES.NOME_AGENTE',
            'AGENTES.TIPO as AGENTE_TIPO',
            'CRC_CP.SALDO_DEVEDOR',
            'CRC_CP.LINHA_DIGITAVEL',
        )
            ->leftJoin('CLIENTES', 'CRC_CP.CLIENTE', '=', 'CLIENTES.CODIGO')
            ->leftJoin('AGENTES', 'CRC_CP.AG_COBRADOR', 'AGENTES.CODAGENTE')
            ->where('CRC_CP.TIPO', '=', 'R')
            ->where('CLIENTES.CNPJ', '=', $clienteCnpj)
            // ->where('CRC_CP.SALDO_DEVEDOR', '<>', 0)
            ->where('CRC_CP.DELETADO', '=', 0)
            ->where(function ($query) {
                $query
                    ->where('SOMA_FLAG', '<>', 'S')
                    ->orWhere('SOMA_FLAG', '=', null);
            })
            ->orderBy('CRC_CP.DT_VENCIMENTO', 'DESC')
            ->paginate($this->porPagina);

        return $contas;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.contas.contas-list', ['contas' => $this->dados()]);
    }
}

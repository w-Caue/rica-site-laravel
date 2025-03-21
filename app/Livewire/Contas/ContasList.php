<?php

namespace App\Livewire\Contas;

use App\Models\Rcfin\Contas;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ContasList extends Component
{
    use WithPagination;

    public $sortField = 'ID';
    public $sortAsc = true;

    public $search;

    public $porPagina = '5';

    public $readyToLoad = false;

    public $dataAtual;

    public $filterStatus = 'A';

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

    public function mount()
    {
        $this->dataAtual = date('Y-m-d');
    }

    public function dados()
    {
        $clienteCnpj =  Auth::user()->CNPJ;

        $data =  Carbon::now()->addMonths(-6)->format('d M Y');

        $contas = Contas::select(
            'CRC_CP.COD_SEQ',
            'CRC_CP.TIPO',
            'CRC_CP.VENDA',
            'CRC_CP.CLIENTE',
            'CLIENTES.CNPJ',
            'CLIENTES.NOME as NOME_CLIENTE',
            'CRC_CP.N_DOCUMENTO',
            'CRC_CP.DT_VENCIMENTO',
            'CRC_CP.DT_LANCAMENTO',
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
            ->where('CRC_CP.DELETADO', '=', 0)

            ->where(function ($query) {
                $query
                    ->where('SOMA_FLAG', '<>', 'S')
                    ->orWhere('SOMA_FLAG', '=', null);
            })

            ->where('CRC_CP.DT_LANCAMENTO', '>', $data)

            ->when($this->filterStatus == 'A', function ($query) {
                return $query->where('CRC_CP.SALDO_DEVEDOR', '>', 0);
            })

            ->when($this->filterStatus == 'P', function ($query) {
                return $query->where('CRC_CP.SALDO_DEVEDOR', '=', 0);
            })

            ->orderBy('CRC_CP.DT_VENCIMENTO', 'DESC')
            ->paginate($this->porPagina);

        return $contas;
    }

    public function copy()
    {
        return LivewireAlert::title('CNPJ COPIADO')
            ->success()
            ->toast()
            ->show();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.contas.contas-list', ['contas' => $this->dados()]);
    }
}

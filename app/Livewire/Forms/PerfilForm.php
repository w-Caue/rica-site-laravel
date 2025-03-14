<?php

namespace App\Livewire\Forms;

use App\Models\RicaClientes;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PerfilForm extends Form
{
    public $codrcfin;

    public $cnpj;

    public $razao;

    public $fantasia;

    public $telefone;

    public $contato;

    public $email;

    public $dtLimite;

    public $dtVencimento;

    public $terminais;

    public $versaoRcfin;

    public $observacao;

    public function setCliente()
    {
        $codRica =  Auth::user()->CODIGO_RCFIN;

        $cliente = RicaClientes::where('CODIGO_RCFIN', $codRica)->first();

        // dd($cliente);

        $this->codrcfin = $cliente->CODIGO_RCFIN;

        $this->cnpj = $cliente->CNPJ;

        $this->razao = $cliente->NOME;

        $this->fantasia = $cliente->FANTASIA;

        $this->telefone = $cliente->CL_TELEFONE;
        $this->contato = $cliente->CL_CONTATO;
        $this->email = $cliente->CL_EMAIL;

        $this->versaoRcfin = $cliente->VERSAO_SISTEMA;
        $this->dtVencimento = $cliente->VENCIMENTO_BOLETO;
        $this->terminais = $cliente->RICA_TERMINAIS;
    }
}

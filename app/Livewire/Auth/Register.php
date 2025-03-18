<?php

namespace App\Livewire\Auth;

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate('required')]
    public $cnpj;

    #[Validate('required')]
    public $nome;

    #[Validate('required|email')]
    public $email;

    public $button = false;

    public $checkCnpj;

    public function updatedEmail()
    {
        if ($this->validate()) {
            return $this->button = true;
        }

        $this->button = false;
    }

    public function delInput()
    {
        $this->cnpj = '';
    }

    public function validaCPF()
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $this->cnpj);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            $this->cnpj = '';
            return LivewireAlert::title('CPF Incorreto')
                ->toast()
                ->error()
                ->show();
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $this->cnpj = '';
            return LivewireAlert::title('CPF Incorreto')
                ->toast()
                ->error()
                ->show();
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                $this->cnpj = '';
                return LivewireAlert::title('CPF Incorreto')
                    ->toast()
                    ->error()
                    ->show();
            }
        }
        return true;
    }

    public function validaCNPJ()
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $this->cnpj);

        // Valida tamanho
        if (strlen($cnpj) != 14) {
            $this->cnpj = '';
            return LivewireAlert::title('CNPJ Incorreto')
                ->toast()
                ->error()
                ->show();
        }


        // Verifica se todos os digitos são iguais
        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            $this->cnpj = '';
            return LivewireAlert::title('CNPJ Incorreto')
                ->toast()
                ->error()
                ->show();
        }

        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            $this->cnpj = '';
            return LivewireAlert::title('CNPJ Incorreto')
                ->toast()
                ->error()
                ->show();
        }

        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}

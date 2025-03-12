<?php

namespace App\Livewire\Auth;

use App\Models\RicaClientes;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $cnpj;

    public $senha;

    public function login()
    {
        $cnpj = preg_replace(array('/[^a-z0-9]/i'), array('', ''), $this->cnpj);

        $cliente = RicaClientes::select(
            'CNPJ',
            'CODIGO_RCFIN'
        )
            ->where('CNPJ', $cnpj)->first();

        if (!$cliente) {
            return LivewireAlert::title('Oops')
                ->text('Você não é um cliente Rica')
                ->warning()
                ->show();
        }

        $senhaCorreta = $this->senha == $cliente->CODIGO_RCFIN;

        if (!$senhaCorreta) {
            return LivewireAlert::title('Senha Incorreta')
                ->text('Verifique as informações')
                ->error()
                ->show();
        }

        Auth::login($cliente);
        return redirect()->route('rica.dashboard');
    }

    #[Layout('layouts.auth')]
    public function render()
    {

        return view('livewire.auth.login');
    }
}

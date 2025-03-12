<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public $cnpj;

    public $nome;

    public $email;

    public function getRegister()
    {
        dd($this->cnpj, $this->nome, $this->email);
    }

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}

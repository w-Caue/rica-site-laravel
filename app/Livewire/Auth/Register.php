<?php

namespace App\Livewire\Auth;

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

    public function updatedEmail()
    {
        if ($this->validate()) {
            return $this->button = true;
        }

        $this->button = false;
    }

    #[Layout('layouts.auth')]
    public function render()
    {
        return view('livewire.auth.register');
    }
}

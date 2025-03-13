<?php

namespace App\Livewire;

use App\Livewire\Forms\PerfilForm;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Perfil extends Component
{
    public PerfilForm $form;

    public function mount()
    {
        $this->form->setCliente();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.perfil');
    }
}

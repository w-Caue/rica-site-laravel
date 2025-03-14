<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Ticket extends Component
{
    public $sortField = 'CODIGO';
    public $sortAsc = true;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.ticket');
    }
}

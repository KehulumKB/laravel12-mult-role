<?php

namespace App\Livewire\Components;

use App\Models\Woreda;
use Livewire\Component;

class KebelesSelect extends Component
{
    public $woredas;

    public function mount(){
        $this->woredas = Woreda::all();
    }

    public function render()
    {
        return view('livewire.components.kebeles-select');
    }
}

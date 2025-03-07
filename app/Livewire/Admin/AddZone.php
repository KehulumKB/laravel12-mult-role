<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class AddZone extends Component
{
    public $zone;

    public function addZone(){
        dd($this->zone);
    }

    public function render()
    {
        return view('livewire.admin.add-zone');
    }
}

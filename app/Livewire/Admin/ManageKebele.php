<?php

namespace App\Livewire\Admin;

use App\Models\Kebele;
use Livewire\Component;

class ManageKebele extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-kebele', [
            'kebeles' => Kebele::get(),
        ]);
    }
}

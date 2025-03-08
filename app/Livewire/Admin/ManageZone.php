<?php

namespace App\Livewire\Admin;

use App\Models\Region;
use App\Models\Zone;
use Livewire\Component;

class ManageZone extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-zone', [
            'zones' => Zone::get(),
        ]);
    }
}

<?php

namespace App\Livewire\Admin;

use App\Models\Region;
use Livewire\Component;

class ManageRegion extends Component
{

    public function render()
    {
        return view('livewire.admin.manage-region', ['regions'=>Region::get()]);
    }
}

<?php

namespace App\Livewire\Admin;

use App\Models\SubCity;
use Livewire\Component;

class ManageSubCity extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-sub-city', [
            'subCities' => SubCity::get(),
        ]);
    }
}

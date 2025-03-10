<?php

namespace App\Livewire\Admin;

use App\Models\City;
use Livewire\Component;

class ManageCity extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-city', [
            'cities' => City::get(),
        ]);
    }
}

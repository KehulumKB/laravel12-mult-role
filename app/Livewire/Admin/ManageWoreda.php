<?php

namespace App\Livewire\Admin;

use App\Models\Woreda;
use Livewire\Component;

class ManageWoreda extends Component
{
    public function render()
    {
        return view('livewire.admin.manage-woreda', [
            'woredas' => Woreda::get(),
        ]);
    }
}

<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Admin - Add New User')]
class AddNewUser extends Component
{
    public function addUser(){
        dd("Addedd");
    }

    public function render()
    {
        return view('livewire.admin.add-new-user');
    }
}

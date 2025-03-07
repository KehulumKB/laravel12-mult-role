<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Admin - Manage Users')]

class ManageUsers extends Component
{
    public function render()
    {
        $users = User::get();
        return view('livewire.admin.manage-users', [
            'users' => $users
        ]);
    }
}

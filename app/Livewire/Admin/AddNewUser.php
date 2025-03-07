<?php

namespace App\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Database\QueryException;

#[Title('Admin - Add New User')]
class AddNewUser extends Component
{
    // #[Validate('required|unique:users,name')]
    public $username;
    // #[Validate('required|unique:users,email')]
    public $email;
    // #[Validate('required')]
    public $role;
    // #[Validate('required')]
    public $status;
    // #[Validate('required|confirmed')]
    public $password;
    // #[Validate('required')]
    public $password_confirmation;

    public function addUser(Request $request)
    {
        $this->validate([
            'username' => 'required|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|integer',
            'status' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            User::create([
                'name' => $this->username,
                'emaila' => $this->email,
                'role_id' => $this->role,
                'status' => $this->status,
                'password' => $this->password,
            ]);
            session()->flash('message', 'Users Data saved successfully!');
            return $this->redirectRoute('admin.manage-users');
        } catch (QueryException $e) {
            session()->flash('error', 'Failed to save data!');
        }
    }

    public function render()
    {
        return view('livewire.admin.add-new-user', [
            'roles' => Role::get(),
        ]);
    }
}

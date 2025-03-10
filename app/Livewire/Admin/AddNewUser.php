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
    public $username;
    public $email;
    public $role;
    public $status;
    public $password;
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
                'email' => $this->email,
                'role_id' => $this->role,
                'status' => $this->status,
                'password' => $this->password,
            ]);
            session()->flash('message', 'Users Data saved successfully!');
            return $this->redirect('/admin/manage-users', navigate: true);
        } catch (QueryException $e) {
            session()->flash('error', 'Failed to save data!' . $e);
        }
    }

    public function render()
    {
        return view('livewire.admin.add-new-user', [
            'roles' => Role::get(),
        ]);
    }
}

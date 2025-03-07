<?php

namespace App\Livewire\Admin;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;

#[Title('Admin - Update User')]
class UpdateUser extends Component
{
    public $id;
    public $username;
    public $email;
    public $role;
    public $status;
    public $password;
    public $password_confirmation;
    public $old_password;

    public function updateUser(Request $request)
    {

        $this->validate([
            'username' => ['required', Rule::unique('users', 'name')->ignore($this->id)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->id)],
            'role' => 'required|integer',
            'status' => 'required',
            'password' => 'nullable|confirmed',
        ]);

        try {
            $password = $this->password ? Hash::make($this->password) : $this->old_password;

            User::where('id', $this->id)->update([
                'name' => $this->username,
                'email' => $this->email,
                'role_id' => $this->role,
                'status' => $this->status,
                'password' => $password,
            ]);

            session()->flash('message', 'Users Data Updated successfully!');
            return $this->redirectRoute('admin.manage-users');

        } catch (QueryException $e) {
            session()->flash('error', 'Failed to Update data!'.$e);
        }
    }

    public function mount(){
        $user = User::find(request()->id);
        $this->id = $user->id;
        $this->username = $user->name;
        $this->email = $user->email;
        $this->role = $user->role_id;
        $this->status = $user->status;
        // $this->password = $user->password;
        // $this->password_confirmation = $user->password;
        $this->old_password = $user->password;
    }

    public function render()
    {
        return view('livewire.admin.update-user', [
            'roles' => Role::get(),
        ]);
    }
}

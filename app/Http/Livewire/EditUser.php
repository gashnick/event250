<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public $userId;
    public $user;
    public $name;
    public $email;
    public $role;

    public function mount($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $this->userId = $user->id;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->role = $user->role;
        }
    }
    public function validateEmail()
    {
        $this->validate(['email' => 'required|email:rfc,dns|unique:users']);
    }
    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:users,email,' . $this->userId,
            'role' => 'required|string',
        ]);
        $user = User::find($this->userId);

        if ($user) {
            $user->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
            ]);

            return redirect('/users');
        }
    }

    public function render()
    {
        return view('livewire.edit-user');
    }
}

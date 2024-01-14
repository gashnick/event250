<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public $users;

    public function editUser($userId)
    {
        return redirect()->route('edit-user', ['userId' => $userId]);
    }

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.users');
    }
}

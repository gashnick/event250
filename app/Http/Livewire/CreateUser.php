<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $role;

    public function validateEmail()
    {
        $this->validate(['email' => 'required|email:rfc,dns|unique:users']);
    }

    public function createUser()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        $user = User::create([
            'names' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);

        auth()->login($user);

        return redirect('/users');
    }
    public function render()
    {
        return view('livewire.create-user');
    }
}

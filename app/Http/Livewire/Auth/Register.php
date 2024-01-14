<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function validateEmail()
    {
        $this->validate(['email' => 'required|email|unique:users']);
    }

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'terms' => 'accepted',
        ]);

        $userRole = User::ROLE_USER;
        $user = User::create([
            'names' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $userRole,
            'remember_token' => Str::random(10),
        ]);

        auth()->login($user);

        if (auth()->user()->role === User::ROLE_ORGANIZER) {
            // Redirect to the organizer dashboard where they can see their events
            return redirect('/dashboard');
        } elseif (auth()->user()->role === User::ROLE_ADMIN) {
            // Redirect to the admin dashboard
            return redirect('/dashboard');
        } else {
            // Redirect to a different dashboard for regular users
            return redirect('/welcome');
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}

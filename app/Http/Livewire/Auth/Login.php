<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function mount()
    {
        if (Auth::check()) {
            $this->redirectUser();
        }
    }

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $this->redirectUser();
        }

        // Display error using SweetAlert2
        session()->flash('error', trans('auth.failed'));
        $this->emit('showError', trans('auth.failed'));
    }

    private function redirectUser()
    {
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
        return view('livewire.auth.login');
    }
}

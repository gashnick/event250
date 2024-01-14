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
        if (Auth::user()->role === User::ROLE_ADMIN) {
            return redirect()->intended('/dashboard');
        } else {
            Auth::logout();
            session()->flash('error', 'You do not have the necessary privileges to access the dashboard.');
            return redirect('/login');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

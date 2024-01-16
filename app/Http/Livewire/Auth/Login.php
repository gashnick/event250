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
            $this->emit('showSuccess', trans('auth.login_success'));
        }

        session()->flash('error', trans('auth.failed'));
        $this->emit('showError', trans('auth.failed'));
    }

    private function redirectUser()
    {
        if (auth()->user()->role === User::ROLE_ORGANIZER) {
            return redirect('/dashboard');
        } elseif (auth()->user()->role === User::ROLE_ADMIN) {
            return redirect('/dashboard');
        } else {
            return redirect('/welcome');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserNavigation extends Component
{
    public $username;

    public function mount()
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Retrieve the authenticated user's name from the database
            $this->username = Auth::user()->names;
        } else {
            // User is not authenticated, set a default value
            $this->username = 'Guest';
        }
    }

    public function render()
    {
        return view('livewire.user-navigation');
    }
}

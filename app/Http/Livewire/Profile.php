<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;

    public function mount()
    {
        // Get the authenticated user
        $this->user = Auth::user();
    }
    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);

        // Save changes
        $this->user->save();

        // Show a success message (you can customize this part)
        session()->flash('message', 'Profile updated successfully!');
    }
    public function render()
    {
        return view('livewire.profile');
    }
}

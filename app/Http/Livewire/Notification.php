<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ClickyButton extends Component
{
    public function tellme()
    {
        $messages = [
            'User created successfully',
            'Event created successfully',
            'User Updated successfully',
            'Login success',
            'Error invalid credentials',
            'Profile updated successfully',
            'User Deleted successfully',
        ];


        $this->notify($messages[array_rand($messages)]);
    }

    public function render()
    {
        return view('livewire.clicky-button');
    }
}

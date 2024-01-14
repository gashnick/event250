<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewUserDetails extends Component
{
    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }
    public function render()
    {
        $user = User::find($this->userId);
        return view('livewire.view-user-details', compact('user'));
    }
}

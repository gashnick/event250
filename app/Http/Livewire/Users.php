<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Gate;

class Users extends Component
{
    use AuthorizesRequests;
    public $users;

    public function editUser($userId)
    {
        return redirect()->route('edit-user', ['userId' => $userId]);
    }

    public function mount()
    {
        $this->authorize('viewAny', User::class);

        $this->users = User::all();
    }

    public function render()
    {
        $this->authorize('viewAny', User::class);

        // Filter users based on policy
        $this->users = $this->users->filter(function ($user) {
            return Gate::allows('view', $user);
        });

        return view('livewire.users');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Users extends Component
{
    use AuthorizesRequests;

    public $users;

    public function editUser($userId)
    {
        return redirect()->route('edit-user', ['userId' => $userId]);
    }
    public function deleteUser($userId)
    {
        $userToDelete = User::find($userId);

        // Authorize the delete action
        $this->authorize('delete', $userToDelete);

        // Delete the user
        $userToDelete->delete();

        // Reload users after deletion
        $this->loadUsers();

        // Optionally, you can display a success message or perform other actions
        session()->flash('message', 'User deleted successfully!');
    }
    public function mount()
    {
        $this->authorize('viewAny', User::class);

        $this->loadUsers();
    }

    public function render()
    {
        $this->authorize('viewAny', User::class);

        $this->loadUsers();

        return view('livewire.users');
    }

    protected function loadUsers()
    {
        // Get the authenticated user
        $authenticatedUser = auth()->user();
        $isAdmin = Auth::check() && Auth::user()->role === User::ROLE_ADMIN;

        // Check if the authenticated user is an admin
        if ($isAdmin) {
            // Admin can view all users
            $this->users = User::all();
        } else {
            $this->users = collect();
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Events extends Component
{
    use AuthorizesRequests;

    public $events;

    public function render()
    {
        // Authorize the view action
        $this->authorize('viewAny', Event::class);

        // Check if the authenticated user is an admin
        $isAdmin = Auth::check() && Auth::user()->role === User::ROLE_ADMIN;

        // Fetch events based on the user's role
        $this->events = $isAdmin
            ? Event::with('organizer')->get() // Fetch all events for admin
            : Event::with('organizer')->where('organizer_id', Auth::id())->get(); // Fetch events for organizer

        return view('livewire.events', ['events' => $this->events]);
    }

    public function delete($id)
    {
        // Find the event by ID
        $event = Event::find($id);

        // Authorize the delete action
        $this->authorize('delete', $event);

        // Delete the event
        $event->delete();

        session()->flash('success', 'Event deleted successfully.');
    }
    public function displayEvents()
    {
        $this->events = Event::all();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Events extends Component
{
    use AuthorizesRequests;
    public $events;

    public function render()
    {
        $this->events = Event::all();
        return view('livewire.events');
    }

    public function delete($id)
    {
        $event = Event::find($id);

        // Check if the authenticated user owns the event
        // if a user doen't own the event
        // an AuthorizationException will be thrown
        if (Gate::allows('delete', $event)) {
            $event->delete();
        } else {
            session()->flash('error', 'You are not authorized to delete this event.');
        }
    }
}

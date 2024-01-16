<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventComponent extends Component
{
    public $events;

    public function mount()
    {
        // Fetch events from the database
        $this->events = Event::all();
    }

    public function render()
    {
        return view('livewire.event-component');
    }
}

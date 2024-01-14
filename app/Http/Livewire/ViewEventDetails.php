<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewEventDetails extends Component
{
    use WithFileUploads;

    public $eventId;

    public function mount($eventId)
    {
        $this->eventId = $eventId;
    }

    public function render()
    {
        $event = Event::find($this->eventId);

        return view('livewire.view-event-details', compact('event'));
    }
}

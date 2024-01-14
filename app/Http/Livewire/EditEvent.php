<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditEvent extends Component
{
    use WithFileUploads;

    public $eventId;
    public $name;
    public $type;
    public $time;
    public $date;
    public $venue;
    public $description;
    public $status;
    public $thumbnail;

    public function mount($eventId)
    {
        // Fetch the event details and populate the form fields
        $event = Event::find($eventId);

        if ($event) {
            $this->eventId = $event->id;
            $this->name = $event->name;
            $this->type = $event->type;
            $this->time = $event->time;
            $this->date = $event->date;
            $this->venue = $event->venue;
            $this->description = $event->description;
            $this->status = $event->status;
            // You may need to handle the thumbnail separately based on your storage mechanism
        }
    }

    public function updateEvent()
    {
        // Validate the form fields
        $this->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'time' => 'required',
            'date' => 'required|date',
            'venue' => 'required|string',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update the event in the database
        $event = Event::find($this->eventId);

        if ($event) {
            $event->update([
                'name' => $this->name,
                'type' => $this->type,
                'time' => $this->time,
                'date' => $this->date,
                'venue' => $this->venue,
                'description' => $this->description,
                'status' => $this->status,
            ]);

            // Handle thumbnail upload if provided
            if ($this->thumbnail) {
                // Delete old thumbnail if exists
                if ($event->thumbnail) {
                    Storage::disk('public')->delete($event->thumbnail);
                }

                // Save new thumbnail
                $event->update([
                    'thumbnail' => $this->thumbnail->store('thumbnails', 'public'),
                ]);
            }

            return redirect('/events');
        }
    }


    public function render()
    {
        return view('livewire.edit-event');
    }
}

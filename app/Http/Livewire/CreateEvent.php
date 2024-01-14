<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEvent extends Component
{
    use WithFileUploads;

    public $name;
    public $type;
    public $time;
    public $date;
    public $venue;
    public $description;
    public $status;
    public $thumbnail;

    public function saveEvent()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string',
            'time' => 'required|date_format:H:i',
            'date' => 'required|date',
            'venue' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Get the currently authenticated user (organizer)
        $organizer = Auth::user();

        $eventData = [
            'name' => $this->name,
            'type' => $this->type,
            'time' => $this->time,
            'date' => $this->date,
            'venue' => $this->venue,
            'description' => $this->description,
            'status' => $this->status,
            'organizer_id' => $organizer->id, // Use the organizer's ID
        ];

        if ($this->thumbnail) {
            $thumbnailPath = $this->thumbnail->store('thumbnails', 'public');
            $eventData['thumbnail'] = $thumbnailPath;
        }

        Event::create($eventData);

        session()->flash('success', 'Event created successfully.');
        return redirect('/events');
    }


    public function render()
    {
        return view('livewire.create-event');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Carbon\Carbon;
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
    public $status;
    public $description;
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
        $this->calculateStatus();
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
    private function calculateStatus()
    {
        $eventDateTime = Carbon::parse($this->date . ' ' . $this->time);

        if ($eventDateTime->isToday()) {
            $this->status = 'Today';
        } elseif ($eventDateTime->isPast()) {
            $this->status = 'Ongoing';
        } elseif ($eventDateTime->isFuture()) {
            $this->status = 'Coming soon';
        } else {
            $this->status = 'Undefined status';
        }
    }


    public function render()
    {
        return view('livewire.create-event');
    }
}

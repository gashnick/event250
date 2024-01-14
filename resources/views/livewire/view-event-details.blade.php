<div>
    <h1>Event Details</h1>
    <p><strong>Name:</strong> {{ $event->name }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Time:</strong> {{ $event->time }}</p>
    <p><strong>Venue:</strong> {{ $event->venue }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>

    @if($event->thumbnail)
    <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="Thumbnail" style="max-width: 200px;">
    @else
    No Thumbnail
    @endif

    <div class="mt-3"></div> <!-- Add space between paragraphs and button -->

    <a href="{{ route('manage-events') }}" class="btn btn-primary">Back to Events</a>
</div>
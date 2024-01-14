<div>
    <form wire:submit.prevent="updateEvent" enctype="multipart/form-data" method="post" action="{{ route('update-event', $eventId) }}">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Event Type</label>
            <select wire:model="type" class="form-select" id="type" required>
                <option value="">Select Event Type</option>
                <option value="active">Birthday</option>
                <option value="inactive">Concert</option>
                <option value="inactive">Musical</option>
                <!-- Add more type options as needed -->
            </select>
            @error('type') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" wire:model="time" class="form-control" id="time" required>
            @error('time') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" wire:model="date" class="form-control" id="date" required>
            @error('date') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">Venue</label>
            <input type="text" wire:model="venue" class="form-control" id="venue" required>
            @error('venue') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea wire:model="description" class="form-control" id="description"></textarea>
            @error('description') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select wire:model="status" class="form-select" id="status" required>
                <option value="">Select Status</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <!-- Add more status options as needed -->
            </select>
            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label for="thumbnail" class="form-label">Thumbnail</label>
            <input type="file" wire:model="thumbnail" class="form-control" id="thumbnail">
            @error('thumbnail') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>
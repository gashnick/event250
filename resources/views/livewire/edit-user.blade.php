<div>
    <form wire:submit.prevent="updateUser" enctype="multipart/form-data" method="post" action="{{ route('edit-user', $userId) }}">
        <div class="mb-3">
            <label for="name" class="form-label">Names</label>
            <input type="text" wire:model="name" class="form-control" id="name" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" wire:model="email" class="form-control" id="email" required>
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" wire:model="role" class="form-control" id="role" required>
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
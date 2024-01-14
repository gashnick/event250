<div>
    <form wire:submit.prevent="createUser" action="{{ route('user-create')}}" method="POST">
        @csrf
        <div class="form-group mt-4 mb-4">
            <label for="name">Enter User Name</label>
            <div class="input-group">
                <input wire:model="name" type="text" placeholder="Names" class="form-control" id="name" required>
            </div>
            @error('name') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="form-group mt-4 mb-4">
            <label for="email">Enter User Email</label>
            <div class="input-group">
                <input wire:model.defer="email" wire:change="validateEmail" type="email" class="form-control" placeholder="email" autofocus required>
            </div>
            @error('email') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="form-group mt-4 mb-4">
            <label for="password">Enter User Password</label>
            <div class="input-group">
                <input wire:model="password" type="password" class="form-control" placeholder="Password" autofocus required>
            </div>
            @error('password') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <div class="form-group mt-4 mb-4">
            <label for="role">Enter User Role</label>
            <div class="input-group">
                <input wire:model="role" type="text" class="form-control" placeholder="Role" autofocus required>
            </div>
            @error('role') <div class="invalid-feedback"> {{ $message }} </div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add User</button>
    </form>
</div>
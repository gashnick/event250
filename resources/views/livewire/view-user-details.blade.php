<div>
    <h1>User Details</h1>
    <p><strong>Name:</strong> {{ $user->names }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Role:</strong> {{ $user->role }}</p>

    <div class="mt-3"></div>

    <a href="{{ route('users') }}" class="btn btn-primary">Back to Users</a>
</div>
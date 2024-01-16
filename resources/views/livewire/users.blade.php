<div>
    <title>Manage Users</title>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            </nav>
            <h2 class="h4">Users List</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('user-create')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                New User
            </a>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row justify-content-between align-items-center">
            <div class="col-9 col-lg-8 d-md-flex">
                <div class="input-group me-2 me-lg-3 fmxw-300">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search users">
                </div>
            </div>
        </div>
    </div>
    <div class="card card-body shadow border-0 table-wrapper table-responsive">
        <table class="table user-table table-hover align-items-center">
            <thead>
                <tr>
                    <th class="border-bottom">
                        #
                    </th>
                    <th class="border-bottom">Name</th>
                    <th class="border-bottom">Email</th>
                    <th class="border-bottom">Role</th>
                    <th class="border-bottom">Date Created</th>
                    <th class="border-bottom">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>
                        <span>{{ $user->id }}</span>
                    </td>
                    <td>{{ $user->names }}</td>
                    <td>
                        <div class="small text-gray">{{ $user->email }}</div>
                    </td>
                    <td>
                        <div class="small text-gray">{{ $user->role }}</div>
                    </td>
                    <td><span class="fw-normal d-flex align-items-center">{{ $user->created_at->format('d M Y') }}</span></td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                    </path>
                                </svg>
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1">
                                <a href="{{ route('user-details', ['userId' => $user->id]) }}" class="dropdown-item d-flex align-items-center">
                                    <span class="fas fa-user-shield me-2"></span>
                                    View User Details
                                </a>
                                <a href="{{ route('edit-user', ['userId' => $user->id]) }}" class="dropdown-item d-flex align-items-center">
                                    <span class="fas fa-user-shield me-2"></span>
                                    Edit User
                                </a>

                                <a class="dropdown-item d-flex align-items-center">
                                    @foreach ($users as $user)
                                    <li>
                                        {{ $user->name }}
                                        @can('delete', $user)
                                        <button wire:click="deleteUser({{ $user->id }})">Delete</button>
                                        @endcan
                                    </li>
                                    @endforeach
                                </a>
                            </div>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
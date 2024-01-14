<div>

    <head>
        <title>Manage Events</title>
    </head>


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <h2 class="h4">All Events</h2>
            <p class="mb-0">Event List</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('create-events')}}" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                Add New Event
            </a>
            <div class="btn-group ms-2 ms-lg-3">
                <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
            </div>
        </div>
    </div>
    <div class="table-settings mb-4">
        <div class="row align-items-center justify-content-between">
            <div class="col col-md-6 col-lg-3 col-xl-4">
                <div class="input-group me-2 me-lg-3 fmxw-400">
                    <span class="input-group-text">
                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                    <input type="text" class="form-control" placeholder="Search Events">
                </div>
            </div>
        </div>
    </div>
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Date</th>
                    <th class="border-gray-200">Time</th>
                    <th class="border-gray-200">Venue</th>
                    <th class="border-gray-200">Organizer Id</th>
                    <th class="border-gray-200">Description</th>
                    <th class="border-gray-200">Action</th>
                    <th class="border-gray-200">Thumbnail</th>
                    <th class="border-gray-200">status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->time }}</td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->organizer_id }}</td>
                    <td>{{ $event->description }}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="icon icon-sm">
                                    <span class="fas fa-ellipsis-h icon-dark"></span>
                                </span>
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu py-0">
                                <a href="{{ route('event-details', ['eventId' => $event->id]) }}" class="dropdown-item rounded-top">
                                    <span class="fas fa-eye me-2"></span>View Details
                                </a>
                                <a class="dropdown-item" href="{{ route('update-event', ['eventId' => $event->id]) }}">
                                    <span class="fas fa-edit me-2"></span>Edit
                                </a>
                                <button wire:click="delete('{{ $event->id }}')" class="dropdown-item text-danger rounded-bottom">
                                    <span class="fas fa-trash-alt me-2"></span>Delete
                                </button>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if($event->thumbnail)
                        <img src="{{ asset('storage/' . $event->thumbnail) }}" alt="Thumbnail" style="max-width: 50px;">
                        @else
                        No Thumbnail
                        @endif
                    </td>
                    <td>{{ $event->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <nav aria-label="Page navigation example">
                <ul class="pagination mb-0">
                    <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
            <div class="fw-normal small mt-4 mt-lg-0">Showing <b>5</b> out of <b>25</b> entries</div>
        </div>
    </div>
</div>
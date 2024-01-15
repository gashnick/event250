<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Include jQuery and Popper.js (or equivalent) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<!-- Include Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<nav class="navbar-nav align-items-center">
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
            <li class="nav-item dropdown" style="width: auto;">
                <!-- Use a custom class for the button to avoid interfering with page styling -->
                <button class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="box-shadow: none;">
                    {{$username}}
                </button>
                <ul class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">
                    <li><a class="dropdown-item d-flex align-items-center">
                            <livewire:logout />
                        </a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
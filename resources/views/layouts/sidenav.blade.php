<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
  <div class="sidebar-inner px-2 pt-3">
    <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
      <div class="d-flex align-items-center">
        <div class="avatar-lg me-4">
          <img src="/assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white" alt="Bonnie Green">
        </div>
        <div class="d-block">
          <h2 class="h5 mb-3">name</h2>
          <a href="/login" class="btn btn-secondary btn-sm d-inline-flex align-items-center">
            <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            Sign Out
          </a>
        </div>
      </div>
      <div class="collapse-close d-md-none">
        <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
          <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
    </div>
    <ul class="nav flex-column pt-3 pt-md-0">
      <li class="nav-item">
        <a href="/dashboard" class="nav-link d-flex align-items-center">
          <span class="sidebar-icon me-3">
            <img src="/assets/img/brand/light.svg" height="20" width="20" alt="Volt Logo">
          </span>
          <span class="mt-1 ms-1 sidebar-text">
            Event <span class="">250</span>
          </span>
        </a>
      </li>
      <li class="nav-item {{ Request::segment(1) == 'dashboard' ? 'active' : '' }} d-inline">
        <a href="/dashboard" class="nav-link">
          <div class="d-flex align-items-center sidebar-icon">
            <span class="material-symbols-outlined me-2">
              dashboard
            </span>
            <span class="sidebar-text">Dashboard</span>
          </div>
        </a>
      </li>

      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-laravel" aria-expanded="true">
          <div class="d-flex align-items-center sidebar-icon">
            <span class="material-symbols-outlined me-2 ">
              manage_accounts
            </span>
            <span class="sidebar-text sidebar-icon" style="color: #fb503b;">User Settings</span>
          </div>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse show" role="list" id="submenu-laravel" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(1) == 'profile' ? 'active' : '' }}">
              <a href="/profile" class="nav-link">
                <span class="sidebar-icon">
                  <span class="sidebar-text">Profile</span></span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'users' ? 'active' : '' }}">
              <a href="/users" class="nav-link">
                <span class="sidebar-text sidebar-icon">User management</span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ Request::segment(1) == 'events' ? 'active' : '' }}">
        <a href="{{ route('manage-events') }}" class="nav-link">
          <span class="sidebar-icon d-flex align-items-center">
            <span class="material-symbols-outlined me-2">
              event
            </span>
            <span class="sidebar-text">Events</span>
          </span>
        </a>
      </li>


      <li class="nav-item {{ Request::segment(1) == 'transactions' ? 'active' : '' }}">
        <span class="sidebar-icon">
          <a href="/transactions" class="nav-link">
            <span class="sidebar-icon d-flex align-items-center">
              <span class="material-symbols-outlined me-2">
                paid
              </span>
              <span class="sidebar-text">Transactions</span>
          </a>
      </li>
      <li class="nav-item">
        <span class="nav-link collapsed d-flex justify-content-between align-items-center" data-bs-toggle="collapse" data-bs-target="#submenu-components">
          <div class="d-flex align-items-center">
            <span class="sidebar-icon d-flex align-items-center">
              <span class="material-symbols-outlined me-2">
                book_5
              </span>
              <span class="sidebar-text">Bookings</span></span>
          </div>
          <span class="link-arrow"><svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg></span>
        </span>
        <div class="multi-level collapse {{ Request::segment(1) == 'buttons' || Request::segment(1) == 'notifications' || Request::segment(1) == 'forms' || Request::segment(1) == 'modals' || Request::segment(1) == 'typography' ? 'show' : '' }}" role="list" id="submenu-components" aria-expanded="false">
          <ul class="flex-column nav">
            <li class="nav-item {{ Request::segment(1) == 'buttons' ? 'active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-text sidebar-icon">New Bookings</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'notifications' ? 'active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-text sidebar-icon">Approved Bookings</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'forms' ? 'active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-text sidebar-icon">Cancelled Bookings</span>
              </a>
            </li>
            <li class="nav-item {{ Request::segment(1) == 'modals' ? 'active' : '' }}">
              <a class="nav-link" href="#">
                <span class="sidebar-text sidebar-icon">Pending bookings</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
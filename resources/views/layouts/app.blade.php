@php
$dashboardRoutes = ['dashboard', 'user-management', 'profile', 'users', 'bootstrap-tables', 'transactions', 'buttons', 'manage-events', 'create-events', 'edit-user', 'user-create', 'update-event','event-details', 'user-details'];
$authRoutes = ['register', 'login','home', 'forgot-password', 'forgot-password-example', 'reset-password', 'reset-password-example'];
$errorRoutes = ['404', '500', 'lock'];
$currentRoute = request()->route()->getName();
@endphp

<x-layouts.base>

    @if(in_array($currentRoute, $dashboardRoutes))

    {{-- Nav --}}
    @include('layouts.nav')
    {{-- SideNav --}}
    @include('layouts.sidenav')
    <main class="content">
        {{-- TopBar --}}
        @include('layouts.topbar')
        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer')

        @elseif(in_array($currentRoute, $authRoutes))

        {{ $slot }}
        {{-- Footer --}}
        @include('layouts.footer2')

        @elseif(in_array($currentRoute, $errorRoutes))

        @livewire('wire-elements-modal')
        @livewireScripts
        {{ $slot }}

        @endif
        @if(session()->has('error'))
        <script>
            Livewire.on('showError', function(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: message,
                });
            });
        </script>
        @endif
</x-layouts.base>
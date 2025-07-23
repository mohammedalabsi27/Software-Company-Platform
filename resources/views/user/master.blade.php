<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'User Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="user-id" content="{{ Auth::id() }}">

    {{-- Bootstrap & Font Awesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    {{-- <script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>

    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
    
        var pusher = new Pusher("{{ env('PUSHER_APP_KEY') }}", {
          cluster: 'ap1'
        });
    
        var channel = pusher.subscribe('user.{{ auth()->id() }}');
        channel.bind('App\\Events\\RequestStatusUpdatedEvent', function(data) {
            // console.log('Admin note:', data['admin_note']);
            // alert(`Your request #${data.request_id} status changed to: ${data.status}`);
            console.log('✅ Subscribed to private-user.1 successfully!');

        });
      </script> --}}
    
    <style> 
        body {
            background-color: #f8f9fa;
        }

        .wrapper {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #212529;
            color: #fff;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .sidebar a {
            color: #fff;
            padding: 15px;
            display: block;
            font-size: 1rem;
            text-decoration: none;
            transition: 0.3s ease;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #343a40;
            border-left: 4px solid #0d6efd;
        }

        .main-content {
            flex-grow: 1;
            overflow-y: auto;
        }

        .navbar {
            z-index: 1000;
        }

        .nav-link .badge {
            font-size: 0.7rem;
        }

        main {
            padding: 2rem;
            background-color: #fff;
            min-height: calc(100vh - 56px); /* navbar height */
        }
    </style>
    @vite("resources/js/app.js")
    @stack('styles')
</head>
<body>
    <div class="wrapper">
        {{-- Sidebar --}}
        <div class="sidebar p-3">
            <h4>User Panel</h4>
            <a href="{{ route('user.dashboard') }}" class="@yield('dashboard-active')">
                <i class="fas fa-home me-2"></i> Dashboard
            </a>
            <a href="{{ route('user.requests.index') }}" class="@yield('requests-active')">
                <i class="fas fa-folder me-2"></i> My Requests
            </a>
            <a href="{{ route('user.profile') }}" class="@yield('profile-active')">
                <i class="fas fa-user me-2"></i> Profile
            </a>
            <a href="{{ route('user.logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Logout
            </a>
            <form id="logout-form" method="POST" action="{{ route('user.logout') }}" style="display: none;">
                @csrf
            </form>
        </div>

        {{-- Main content --}}
        <div class="main-content d-flex flex-column">
            {{-- Navbar --}}
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm px-4">
                <div class="container-fluid">
                    <span class="navbar-brand">Welcome, {{ auth()->user()->name }}</span>

                    <ul class="navbar-nav ms-auto">
                        {{-- Notifications --}}
                        @php $notifications = auth()->user()->unreadNotifications; @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle position-relative" id="notificationCount" href="#" data-bs-toggle="dropdown">
                                <i class="fa fa-bell fa-lg"></i>
                                @if(count($notifications))
                                    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">
                                        {{ count($notifications) }}
                                    </span>
                                @endif
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow" id="notificationList" style="width: 300px;">
                                @forelse($notifications as $notification)
                                    <li class="px-3 py-2 border-bottom">
                                        <a href="{{ route('user.requests.show', $notification->data['request_id']) }}" class="text-dark d-block">
                                            Request updated to: <strong>{{ $notification->data['status'] }}</strong>
                                        </a>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </li>
                                @empty
                                    <li class="text-center p-2">No notifications</li>
                                @endforelse
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            {{-- Page content --}}
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery أولاً -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- <!-- ثم Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Toastr CSS (إذا لم يكن موجوداً بالفعل) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" /> --}}

    <!-- إشعارات توستر -->
    <x-toastr></x-toastr>


    @stack('scripts')
    
</body>
</html>

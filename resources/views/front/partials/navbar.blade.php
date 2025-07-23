<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="{{ route('front.index') }}" class="navbar-brand p-0">
        <h1 class="m-0">{{ $settings->site_name }}</h1>
        <!-- <img src="{{-- asset('assets-front') --}}/img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ route('front.index') }}" class="nav-item nav-link @yield('home-active')">Home</a>
            <a href="{{ route('front.about') }}" class="nav-item nav-link @yield('about-active')">About</a>
            <a href="{{ route('front.service') }}" class="nav-item nav-link @yield('service-active')">Service</a>
            <a href="{{ route('front.contact') }}" class="nav-item nav-link @yield('contact-active')">Contact</a>

            @if (!Auth::check())
            <a href="{{ route('user.register') }}" class="nav-item nav-link">
                <button class="btn btn-sm ms-3" style="background-color: #FF5722; color: white; border: none;">
                    <i class="fas fa-sign-in-alt me-1"></i> Register / Login
                </button>
            </a>
            @else
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-2"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">
                            <i class="fas fa-home me-2"></i>Dashboard
                        </a></li>
                        <li>
                            <form action="{{ route('user.logout') }}" method="POST" id="form_logout">
                                @csrf
                                <a href="javascript:void(0);" class="dropdown-item text-danger"
                                   onclick="document.getElementById('form_logout').submit();">
                                   <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</nav>
<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted">
      <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
    </form>
    <ul class="nav">
      <li class="nav-item">
        @include('admin.partials.language')
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
          <span class="fe fe-grid fe-16"></span>
        </a>
      </li>

      @php $notifications = Auth::guard('admin')->user()->unreadnotifications; @endphp
      <li class="nav-item nav-notif">
        <a class="nav-link text-muted my-2"  href="./#"  data-toggle="modal" data-target=".modal-notif">
          <span class="fe fe-bell fe-16"></span>
          @if (count($notifications))
            <span id="unread-notifications-count" class="dot dot-md text-success" >{{ count($notifications) }}</span>
          @endif
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="avatar avatar-sm mt-2">
            <img src="{{asset('assets-admin')}}/assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Profile</a>
          <a class="dropdown-item" href="#">Settings</a>
          <a class="dropdown-item" href="#">Activities</a>
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="dropdown-item text-danger"  type="submit">{{ __('keywords.logout') }}</button>
          </form>
        </div>
      </li>

    </ul>
  </nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item w-100">
          <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text">{{ __('keywords.dashboard') }}</span>
          </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>{{ __('keywords.components') }}</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2" id="accordionSidebar">
        {{-- <li class="nav-item dropdown">
          <a href="#Services" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-codesandbox fe-16"></i>
            <span class="ml-3 item-text">{{ __('keywords.services') }}</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="Services">
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('admin.services.index') }}"><span class="ml-1 item-text">{{ __('keywords.all_services') }}</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('admin.services.create') }}"><span class="ml-1 item-text">{{ __('keywords.add_service') }}</span></a>
            </li>
          </ul>
        </li> --}}
        <x-sidebar-tab name="services" icon="fe-codesandbox" 
          :items="[
            ['href' => route('admin.services.index'), 'text' => __('keywords.all_services')],
            ['href' => route('admin.services.create'), 'text' => __('keywords.add_service')],
          ]">
        </x-sidebar-tab>
        <x-sidebar-tab name="features" icon="fe-bookmark"
          :items="[
            ['href' => route('admin.features.index'), 'text' => __('keywords.all_features')],
            ['href' => route('admin.features.create'), 'text' => __('keywords.add_feature')],
          ]">
        </x-sidebar-tab>
        <x-sidebar-tab name="messages" icon="fe-message-square"
          href="{{ route('admin.messages.index') }}">
        </x-sidebar-tab>
        <x-sidebar-tab name="subscribers" icon="fe-users" 
          href="{{ route('admin.subscribers.index') }}">
        </x-sidebar-tab>
        <x-sidebar-tab name="requests" icon="fe-list"
          href="{{ route('admin.requests.index') }}">
        </x-sidebar-tab>
        <x-sidebar-tab name="settings" icon="fe-settings" 
          href="{{ route('admin.settings.index') }}">
        </x-sidebar-tab>
      </ul>
    </nav>
  </aside>
@php
  $isActiveGroup = false;
  if(isset($items)){
    foreach ($items as $item) {
      if (request()->url() == $item['href']) {
        $isActiveGroup = true;
        break;
      }
    }
  } else {
    $isActiveGroup = request()->url() == $href;
  }
@endphp
@if (isset($items))
  {{-- Dropdown tab --}}
  <li class="nav-item dropdown">
    <a href="#{{ $name }}" data-toggle="collapse" aria-expanded="{{ $isActiveGroup ? 'true' : 'false' }}"
       class="dropdown-toggle nav-link {{ $isActiveGroup ? 'active' : '' }}">
      <i class="fe {{ $icon }} fe-16"></i>
      <span class="ml-3 item-text">{{ __("keywords.$name") }}</span>
    </a>
    <ul class="collapse list-unstyled pl-4 w-100 {{ $isActiveGroup ? 'show' : '' }}" id="{{ $name }}"  data-parent="#accordionSidebar">
      @foreach ($items as $item)
        <li class="nav-item">
          <a class="nav-link dd pl-3 {{ request()->url() == $item['href'] ? 'active' : '' }}" href="{{ $item['href'] }}">
            <span class="ml-1 item-text">{{ $item['text'] }}</span>
          </a>
        </li>        
      @endforeach
    </ul>
  </li>
@else
  {{-- Single link tab --}}
  <li class="nav-item">
    <a class="nav-link  {{ $isActiveGroup ? 'active' : '' }}" href="{{ $href }}" >
      <i class="fe {{ $icon }} fe-16"></i>
      <span class="ml-3 item-text">{{ __("keywords.$name") }}</span>
    </a>
  </li>   
@endif



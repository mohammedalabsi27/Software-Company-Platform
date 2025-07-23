<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">

    <form method="GET" action="{{ $route }}" class="d-flex align-items-center flex-grow-1">
  
      {{-- فلترة عدد العناصر --}}
      <label class="mb-0 mr-2">{{ __('keywords.showing') ?? 'Showing' }}</label>
      <select name="per_page" class="form-control mr-2"  style="width: 80px;" onchange="this.form.submit()">
        @foreach([10, 25, 50, 100] as $size)
          <option value="{{ $size }}" {{ request('per_page') == $size ? 'selected' : '' }}>
            {{ $size }}
          </option>
        @endforeach
      </select>
      <label class="mb-0 mr-4">{{ __('keywords.entries') ?? 'entries' }}</label>
  
      {{-- حقل البحث --}}
      <div class="position-relative w-50 mr-3">
        <input type="text" name="search" value="{{ request('search') }}"
               class="form-control pl-5"
               placeholder="{{ __('keywords.search') }}...">
        <i class="fe fe-search position-absolute" 
           style="left: 20px; top: 50%; transform: translateY(-50%); opacity: 0.6; font-size: 20px;"></i>
      </div>
  
      {{-- زر إرسال مخفي (يمكن المستخدم يضغط Enter) --}}
      <button type="submit" class="d-none"></button>
  
    </form>

    {{-- زر إضافة جديد --}}
    @if ($showAdd)
        <a href="{{ $href }}" class="btn btn-primary">
            <i class="fe fe-plus"></i> {{ __('keywords.add_new') }}
        </a> 
    @endif

  
  </div>
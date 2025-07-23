@extends('admin.auth.master')
@section('title',  __('keywords.login'))

@section('content')
<div class="wrapper vh-100">
    <div class="row align-items-center h-100">
      <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" method="POST" {{ route('admin.store-login') }}>
        @csrf
        @include('admin.partials.language')
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
        <h1 class="h6 mb-3">{{ __('keywords.sign_in') }}</h1>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <div class="form-group">
          <label for="inputEmail" class="sr-only">{{ __('keywords.email') }}</label>
          <input type="email" id="inputEmail" name="email" value="{{ old('email') }}"  class="form-control form-control-lg" placeholder="{{ __('keywords.email') }}" autofocus="">
          @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="form-group">
          <label for="inputPassword" class="sr-only">{{ __('keywords.password') }}</label>
          <input type="password" id="inputPassword"  name="password" class="form-control form-control-lg" placeholder="{{ __('keywords.password') }}" >
          @error('password')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" name="remember" value="remember-me"> {{ __('keywords.remember_me') }} </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('keywords.login') }}</button>
      </form>
    </div>
  </div>
@endsection
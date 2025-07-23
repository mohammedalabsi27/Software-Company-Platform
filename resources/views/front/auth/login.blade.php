@extends('front.master')

@section('title', 'Login')

@section('hero')
    <x-hero-section title="Login" subtitle="Access your account"></x-hero-section>
@endsection

@section('content')
<div class="container py-2">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-sm">
        <div class="card-body">
          <form method="POST" action="{{ route('user.login') }}">
            @csrf

            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}"  autofocus>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
        
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember">
              <label class="form-check-label" for="remember">Remember Me</label>
            </div> --}}
            <div class="d-flex justify-content-between mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
              </div>
              <a href="{{ route('user.password.request') }}">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>

          </form>
          <p class="mt-3 text-center">Don't have an account? <a href="{{ route('user.register') }}">Register here</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

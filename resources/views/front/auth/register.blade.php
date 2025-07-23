@extends('front.master')

@section('title', 'Register')

@section('hero')
    <x-hero-section title="Register" subtitle="Create a new account"></x-hero-section>
@endsection

@section('content')
<div class="container py-2">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-sm">
        <div class="card-body">
          <form method="POST" action="{{ route('user.register') }}">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Register</button>

          </form>
          <p class="mt-3 text-center">Already have an account? <a href="{{ route('user.login') }}">Login here</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

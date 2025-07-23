@extends('front.master')

@section('title', 'Reset Password')

@section('hero')
    <x-hero-section title="Reset Password" subtitle="Set a new password for your account" />
@endsection

@section('content')
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <div class="card shadow-sm">
        <div class="card-body">
          <form method="POST" action="{{ route('user.password.store') }}">
            @csrf

            {{-- Hidden token --}}
            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            {{-- Email --}}
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror"
                     id="email" name="email" value="{{ old('email', request()->email) }}" required autofocus>
              @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
              <label for="password" class="form-label">New Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror"
                     id="password" name="password" required>
              @error('password')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm New Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Reset Password</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

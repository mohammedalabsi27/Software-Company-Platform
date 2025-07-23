@extends('front.master')

@section('title', 'Forgot Password')

@section('hero')
    <x-hero-section title="Forgot Password" subtitle="Enter your email to reset password"></x-hero-section>
@endsection

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-6">


            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="POST" action="{{-- route('password.email') --}}">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                value="{{ old('email') }}" 
                                required 
                                autofocus
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Send Password Reset Link</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

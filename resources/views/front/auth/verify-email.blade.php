@extends('front.master')

@section('title', 'Verify Your Email')

@section('hero')
    <x-hero-section title="Verify Email" subtitle="Please confirm your email address" />
@endsection

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="alert alert-info text-center">
                Thanks for signing up! Before getting started, please verify your email address by clicking on the link we just emailed to you.
                If you didn't receive the email, we will gladly send you another.
            </div>


            <div class="d-flex justify-content-center">
                <form method="POST" action="{{ route('user.verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Resend Verification Email</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

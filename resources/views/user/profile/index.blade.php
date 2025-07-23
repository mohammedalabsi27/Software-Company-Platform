@extends('user.master')

@section('title', 'Profile')
@section('profile-active', 'active')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">My Profile</h4>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Name:</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext">{{ Auth::user()->name }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-9">
                <p class="form-control-plaintext">{{ Auth::user()->email }}</p>
            </div>
        </div>

        <a href="{{-- route('user.profile.edit') --}}" class="btn btn-primary">Edit Profile</a>
    </div>
</div>
@endsection

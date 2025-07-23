@extends('user.master')

@section('title', 'Dashboard')
@section('dashboard-active', 'active')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Welcome, {{ Auth::user()->name }} 👋</h4>
        <p>This is your personal dashboard where you can manage your service requests and profile.</p>
        
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <h6>My Requests</h6>
                    <p>View and track your service requests.</p>
                    <a href="{{ route('user.requests.index') }}" class="btn btn-sm btn-primary">View Requests</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 border bg-light">
                    <h6>Profile Settings</h6>
                    <p>Update your personal information and password.</p>
                    <a href="{{ route('user.profile') }}" class="btn btn-sm btn-secondary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

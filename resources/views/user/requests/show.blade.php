@extends('user.master')

@section('title', 'Request Details')
@section('requests-active', 'active')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="mb-4">Request #{{ $request->id }} - {{ $request->service->title }}</h2>

        <div class="mb-3">
            <strong>Status:</strong>
            <span class="badge bg-{{ getStatusColor($request->status) }}">
                {{ ucfirst(str_replace('_', ' ', $request->status)) }}
            </span>
        </div>

        <div class="mb-3">
            <strong>Description:</strong>
            <p>{{ $request->description ?? 'No description provided.' }}</p>
        </div>

        @if ($request->attachment)
            <div class="mb-3">
                <strong>Attachment:</strong><br>
                <a href="{{ asset('storage/requests/' . $request->attachment) }}" target="_blank" class="btn btn-outline-info btn-sm">
                    View Attachment
                </a>
            </div>
        @endif

        @if ($request->admin_note)
            <div class="mb-3">
                <strong>Admin Note:</strong>
                <p class="text-muted">{{ $request->admin_note }}</p>
            </div>
        @endif

        <div class="mb-3 text-muted">
            <strong>Requested on:</strong> {{ $request->created_at->format('Y-m-d H:i A') }}
        </div>
        
        <a href="{{ route('user.requests.index') }}" class="btn btn-secondary mt-3">Back to My Requests</a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $("#notificationCount").load(" #notificationCount > *");
        $("#notificationList").load(" #notificationList > *");
    });
</script>
@endpush


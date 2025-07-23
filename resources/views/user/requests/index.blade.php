@extends('user.master')

@section('title', 'My Requests')
@section('requests-active', 'active')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="mb-4">My Service Requests</h4>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($requests->count())
                        @foreach ($requests as $request)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $request->service->title }}</td>
                                <td>
                                    <span class="badge bg-{{ getStatusColor($request->status) }}">
                                        {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                    </span>
                                </td>
                                <td>{{ $request->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('user.requests.show', $request) }}" class="btn btn-outline-primary btn-sm">
                                        View
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="100%">
                                <div class="alert alert-danger">No requests found.</div>
                            </td>
                        </tr>    
                    @endif 
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

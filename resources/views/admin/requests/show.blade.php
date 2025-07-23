@extends('admin.master')

@section('title', __('keywords.request_details'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.request') }} #{{ $request->id }}</h2>
        <div class="card shadow">
            <div class="card-body">
                <h4>{{ __('keywords.user_information') }}</h4>
                <p><strong>{{ __('keywords.name') }}:</strong> {{ $request->user->name }}</p>
                <p><strong>{{ __('keywords.email') }}:</strong> {{ $request->user->email }}</p>

                <hr>

                <h4>{{ __('keywords.service_information') }}</h4>
                <p><strong>{{ __('keywords.service') }}:</strong> {{ $request->service->title }}</p>
                <p><strong>{{ __('keywords.description') }}:</strong> {{ $request->description }}</p>
                @if ($request->attachment)
                    <p><strong>{{ __('keywords.attachment') }}:</strong> 
                        <a href="{{ asset('storage/requests/' . $request->attachment) }}" target="_blank">{{ __('keywords.view') }}</a>
                    </p>
                @endif

                <h4>{{ __('keywords.status') }}</h4>
                <span class="badge badge-{{ getStatusColor($request->status) }}">
                    {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                </span>

                <hr>

                <h4>{{ __('keywords.admin_note') }}</h4>
                <p>{{ $request->admin_note ?: 'No notes yet.' }}</p>

                <a href="{{ route('admin.requests.edit',$request) }}" class="btn btn-primary mt-3">{{ __('keywords.edit_request') }}</a>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

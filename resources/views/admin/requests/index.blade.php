@extends('admin.master')

@section('title', __('keywords.all_requests'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="page-title">{{ __('keywords.all_requests') }}</h2>

            <div class="card shadow">
                <div class="card-body">

                    <x-filter-bar route="route('admin.requests.index')" 
                        :showAdd="false">
                    </x-filter-bar>

            
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('keywords.users') }}</th>
                                <th>{{ __('keywords.service') }}</th>
                                <th>{{ __('keywords.status') }}</th>
                                <th>{{ __('keywords.date') }}</th>
                                <th width="15%">{{ __('keywords.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($requests))
                                @foreach ($requests as $key => $request )
                                    <tr>
                                        <td>{{ $requests->firstItem() + $key }}</td>
                                        <td>{{ $request->user->name }}</td>
                                        <td>{{ $request->service->title }}</td>
                                        <td>
                                        <span class="badge badge-{{ getStatusColor($request->status) }}">
                                            {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                        </span>
                                        </td>
                                        <td>{{ $request->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <x-action-button href="{{ route('admin.requests.show', $request) }}" type="show">
                                                <i class="fe fe-eye fa-2x"></i>
                                            </x-action-button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <x-empty-alert></x-empty-alert>        
                            @endif
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-end">
                        {{ $requests->appends(request()->query())->render('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

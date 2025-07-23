@extends('admin.master')

@section('title', __('keywords.all_services'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.all_services') }}</h2>
        <div class="card shadow">
            <div class="card-body">

              <x-filter-bar route="{{ route('admin.services.index') }}" 
                href="{{ route('admin.services.create') }}">
              </x-filter-bar>
              

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>{{ __('keywords.title') }}</th>
                    <th>{{ __('keywords.image') }}</th>
                    <th width="15%">{{ __('keywords.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($services))
                        @foreach ($services as $key => $service )
                        <tr>
                            <td>{{ $services->firstItem() + $loop->index }}</td>
                            <td>{{ $service->title }}</td>
                            <td>
                              <img  width="80" height="50" class="rounded shadow-sm border" src="{{ asset("storage/services/$service->image") }}" alt="">
                            </td>
        
                            <td>
                              <x-action-button href="{{ route('admin.services.show', $service) }}" type="show">
                                <i class="fe fe-eye fa-2x"></i>
                              </x-action-button>
                              <x-action-button href="{{ route('admin.services.edit', $service) }}" type="edit">
                                <i class="fe fe-edit fa-2x"></i>
                              </x-action-button>
                              <x-delete-button href="{{ route('admin.services.destroy', $service) }}" 
                                :record="$service"></x-delete-button>
                            </td>
                          </tr>
                        @endforeach
                    @else
                      <x-empty-alert></x-empty-alert>
                        
                    @endif
                </tbody>
              </table>
              {{ $services->appends(request()->query())->render('pagination::bootstrap-4') }}
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
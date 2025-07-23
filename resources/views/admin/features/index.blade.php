@extends('admin.master')

@section('title', __('keywords.all_features'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.all_features') }}</h2>
        <div class="card shadow">
            <div class="card-body">

              <x-filter-bar route="{{ route('admin.features.index') }}" 
                href="{{ route('admin.features.create') }}">
              </x-filter-bar>
              
            
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>{{ __('keywords.title') }}</th>
                    <th>{{ __('keywords.icon') }}</th>
                    <th width="15%">{{ __('keywords.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($features))
                        @foreach ($features as $key => $feature )
                        <tr>
                            <td>{{ $features->firstItem() + $loop->index }}</td>
                            <td>{{ $feature->title }}</td>
                            <td>{{ $feature->icon }}</td>
                            <td>
                              <x-action-button href="{{ route('admin.features.show', $feature) }}" type="show">
                                <i class="fe fe-eye fa-2x"></i>
                              </x-action-button>
                              <x-action-button href="{{ route('admin.features.edit', $feature) }}" type="edit">
                                <i class="fe fe-edit fa-2x"></i>
                              </x-action-button>
                              <x-delete-button href="{{ route('admin.features.destroy', $feature) }}" 
                              :record="$feature"></x-delete-button>
                            </td>
                          </tr>
                        @endforeach
                    @else
                      <x-empty-alert></x-empty-alert>
                        
                    @endif
                </tbody>
              </table>
              {{ $features->appends(request()->query())->render('pagination::bootstrap-4') }}
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
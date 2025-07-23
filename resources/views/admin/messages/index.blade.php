@extends('admin.master')

@section('title', __('keywords.messages'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.messages') }}</h2>
        <div class="card shadow">
            <div class="card-body">

              <x-filter-bar route="route('admin.messages.index')" 
                :showAdd="false">
              </x-filter-bar>
              

              <table class="table table-hover">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>{{ __('keywords.name') }}</th>
                    <th>{{ __('keywords.email') }}</th>
                    <th>{{ __('keywords.subject') }}</th>
                    <th width="15%">{{ __('keywords.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($messages))
                        @foreach ($messages as $key => $message )
                        <tr>
                            <td>{{ $messages->firstItem() + $loop->index }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->subject }}</td>
                            <td>
                              <x-action-button href="{{ route('admin.messages.show', $message) }}" type="show">
                                <i class="fe fe-eye fa-2x"></i>
                              </x-action-button>
                              <x-delete-button href="{{ route('admin.messages.destroy', $message) }}" 
                              :record="$message"></x-delete-button>
                            </td>
                          </tr>
                        @endforeach
                    @else
                      <x-empty-alert></x-empty-alert>   
                    @endif
                </tbody>
              </table>
              {{ $messages->render('pagination::bootstrap-4') }}
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
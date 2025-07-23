@extends('admin.master')

@section('title', __('keywords.subscribers'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.subscribers') }}</h2>
        <div class="card shadow">
            <div class="card-body">
              <div class="card-title-box">
                <h5 class="card-title">Simple Table</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>               
              </div>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th >#</th>
                    <th>{{ __('keywords.email') }}</th>
                    <th width="15%">{{ __('keywords.actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @if (count($subscribers))
                        @foreach ($subscribers as $key => $subscriber )
                        <tr>
                            <td>{{ $subscribers->firstItem() + $loop->index }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>
                              <x-delete-button href="{{ route('admin.subscribers.destroy', $subscriber) }}" 
                              :record="$subscriber"></x-delete-button>
                            </td>
                          </tr>
                        @endforeach
                    @else
                      <x-empty-alert></x-empty-alert>   
                    @endif
                </tbody>
              </table>
              {{ $subscribers->render('pagination::bootstrap-4') }}
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
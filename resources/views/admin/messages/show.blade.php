@extends('admin.master')

@section('title', __('keywords.show_message'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="page-title">{{ __('keywords.show_message') }}</h2>
          <div class="card-title-right">
            <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">{{ __('keywords.messages') }}</a>
          </div>  
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="form-group">
                  <p>{{ __('keywords.name') }}: {{ $message->name }}</p>
                </div>
                <div class="form-group">
                  <p>{{ __('keywords.email') }}: {{ $message->email }}</p>
                </div>
                <div class="form-group">
                  <p>{{ __('keywords.subject') }}: {{ $message->subject }}</p>
                </div>
                <div class="form-group">
                  <p>{{ __('keywords.message') }}: {{ $message->message }}</p>
                </div>  
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
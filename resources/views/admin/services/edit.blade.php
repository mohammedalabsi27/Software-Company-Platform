@extends('admin.master')

@section('title', __('keywords.edit_service'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.edit_service') }}</h2>
        <div class="card shadow">
            <div class="card-body">
              <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <x-form-label field="title"></x-form-label>
                  <input type="text" class="form-control" name="title" value="{{ $service->title }}" id="title" placeholder="{{ __('keywords.title') }}">
                  <x-validation-error field="title"></x-validation-error>
                </div>
                <div class="form-group">
                  <x-form-label field="image"></x-form-label>
                  <input type="file" name="image" class="form-control-file" id="image" >
                  <x-validation-error field="image"></x-validation-error>
                </div>
                <div class="form-group">
                  <x-form-label field="description"></x-form-label>
                  <textarea type="text" name="description"  class="form-control" id="description" placeholder="{{ __('keywords.description') }}">{{ $service->description }}</textarea>
                  <x-validation-error field="description"></x-validation-error>
                </div>
                <x-submit-button>{{ __('keywords.edit_service') }}</x-submit-button>
              </form>
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
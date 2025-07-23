@extends('admin.master')

@section('title', __('keywords.add_feature'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.add_feature') }}</h2>
        <div class="card shadow">
            <div class="card-body">
              <form action="{{ route('admin.features.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <x-form-label field="title"></x-form-label>
                  <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" placeholder="{{ __('keywords.title') }}">
                  <x-validation-error field="title"></x-validation-error>
                </div>
                <div class="form-group">
                  <x-form-label field="icon"></x-form-label>
                  <input type="text" name="icon" class="form-control" id="icon" value="{{ old('icon') }}" placeholder="{{ __('keywords.icon') }}">
                  <x-validation-error field="icon"></x-validation-error>
                </div>
                <div class="form-group">
                  <x-form-label field="description"></x-form-label>
                  <textarea type="text" name="description"  class="form-control" id="description" placeholder="{{ __('keywords.description') }}">{{ old('description') }}</textarea>
                  <x-validation-error field="description"></x-validation-error>
                </div>
                <x-submit-button>{{ __('keywords.add_feature') }}</x-submit-button>
              </form>
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
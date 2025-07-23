@extends('admin.master')

@section('title', __('keywords.edit_feature'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.edit_feature') }}</h2>
        <div class="card shadow">
            <div class="card-body">
              <form action="{{ route('admin.features.update', $feature) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <x-form-label field="title"></x-form-label>
                  <input type="text" class="form-control" name="title" value="{{ $feature->title }}" id="title" placeholder="{{ __('keywords.title') }}">
                  <x-validation-error field="title"></x-validation-error>
                </div>
                <div class="form-group">
                  <x-form-label field="icon"></x-form-label>
                  <input type="text" name="icon" class="form-control" value="{{ $feature->icon }}" id="icon"  placeholder="{{ __('keywords.icon') }}">
                  <x-validation-error field="icon"></x-validation-error>
                </div>
                <div class="form-group">
                  <x-form-label field="description"></x-form-label>
                  <textarea type="text" name="description"  class="form-control" id="description" placeholder="{{ __('keywords.description') }}">{{ $feature->description }}</textarea>
                  <x-validation-error field="description"></x-validation-error>
                </div>
                <x-submit-button>{{ __('keywords.edit_feature') }}</x-submit-button>
              </form>
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
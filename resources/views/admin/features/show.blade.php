@extends('admin.master')

@section('title', __('keywords.show_feature'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card-title-box d-sm-flex align-items-center justify-content-between mb-3">
          <h2 class="page-title">{{ __('keywords.show_feature') }}</h2>
          <div class="card-title-right">
            <a href="{{ route('admin.features.index') }}" class="btn btn-primary">{{ __('keywords.all_features') }}</a>
          </div>  
        </div>
        <div class="card shadow">
            <div class="card-body">

                <div class="form-group">
                  <p>{{ __('keywords.title') }}: {{ $feature->title }}</p>
                </div>

                <div class="form-group">
                  <p>{{ __('keywords.icon') }}: {{ $feature->icon }}</p>
                </div>
                <div class="form-group">
                  <p>{{ __('keywords.description') }}: {{ $feature->description }}</p>
                </div>  
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
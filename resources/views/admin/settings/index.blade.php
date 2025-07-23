@extends('admin.master')

@section('title', __('keywords.settings'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.settings') }}</h2>
        <div class="card shadow">
            <div class="card-body">
              <div class="row">
                <!-- Sidebar Tabs -->
                <div class="col-md-3">
                    <ul class="nav nav-pills flex-column nav-setting" id="settingsTabs" role="tablist">
                        <li class="nav-item mb-2">
                            <a class="nav-link active" data-toggle="tab" href="#general" role="tab">{{ __('keywords.general') }}</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" data-toggle="tab" href="#contact" role="tab">{{ __('keywords.contact') }}</a>
                        </li>
                        <li class="nav-item mb-2">
                            <a class="nav-link" data-toggle="tab" href="#social" role="tab">{{ __('keywords.social_media') }}</a>
                        </li>
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="col-md-9">
                    <form action="{{ route('admin.settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                        <div class="tab-content border p-4">
                            <!-- General Tab -->
                            <div class="tab-pane fade show active" id="general" role="tabpanel">
                                <div class="form-group">
                                  <x-form-label field="site_name"></x-form-label>
                                  <input type="text" class="form-control" name="site_name" value="{{ $setting->site_name }}" id="site_name" placeholder="{{ __('keywords.site_name') }}">
                                  <x-validation-error field="site_name"></x-validation-error>
                                </div>

                                <div class="form-group">
                                  <x-form-label field="site_logo"></x-form-label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="site_logo" id="site_logo">
                                    <label class="custom-file-label" for="site_logo">{{ __('keywords.choose_file') }}</label>
                                  </div>
                                  <x-validation-error field="site_logo"></x-validation-error>
                                  @if($setting->site_logo)
                                    <img class="mt-2" src="{{ asset("storage/settings/$setting->site_logo") }}" alt="Logo" height="50">
                                  @endif
                                </div>
                                
                                <div class="form-group">
                                  <x-form-label field="site_favicon"></x-form-label>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="site_favicon" id="site_favicon">
                                    <label class="custom-file-label" for="site_favicon">{{ __('keywords.choose_file') }}</label>
                                  </div>
                                  <x-validation-error field="site_favicon"></x-validation-error>
                                  @if($setting->site_favicon)
                                    <img class="mt-2" src="{{ asset("storage/settings/$setting->site_favicon") }}" alt="Favicon" height="50">
                                  @endif
                                </div>

                                <div class="form-group">
                                  <x-form-label field="site_description"></x-form-label>
                                  <textarea type="text" name="site_description"  class="form-control" id="site_description" placeholder="{{ __('keywords.site_description') }}">{{ $setting->site_description }}</textarea>
                                  <x-validation-error field="site_description"></x-validation-error>
                                </div>
                            </div>

                            <!-- Contact Tab -->
                            <div class="tab-pane fade" id="contact" role="tabpanel">
                                <div class="form-group">
                                  <x-form-label field="email"></x-form-label>
                                  <input type="email" class="form-control" name="email" value="{{ $setting->email }}" id="email" placeholder="{{ __('keywords.email') }}">
                                  <x-validation-error field="email"></x-validation-error>
                                </div>

                                <div class="form-group">
                                  <x-form-label field="phone"></x-form-label>
                                  <input type="text" class="form-control" name="phone" value="{{ $setting->phone }}" id="phone" placeholder="{{ __('keywords.phone') }}">
                                  <x-validation-error field="phone"></x-validation-error>
                                </div>

                                <div class="form-group">
                                  <x-form-label field="address"></x-form-label>
                                  <input type="text" class="form-control" name="address" value="{{ $setting->address }}" id="address" placeholder="{{ __('keywords.address') }}">
                                  <x-validation-error field="address"></x-validation-error>
                                </div>
                            </div>

                            <!-- Social Media Tab -->
                            <div class="tab-pane fade" id="social" role="tabpanel">
                                <div class="form-group">
                                  <x-form-label field="facebook"></x-form-label>
                                  <input type="url" class="form-control" name="facebook" value="{{ $setting->facebook }}" id="facebook" placeholder="{{ __('keywords.facebook') }}">
                                  <x-validation-error field="facebook"></x-validation-error>
                                </div>

                                <div class="form-group">
                                  <x-form-label field="linkedin"></x-form-label>
                                  <input type="url" class="form-control" name="linkedin" value="{{ $setting->linkedin }}" id="linkedin" placeholder="{{ __('keywords.linkedin') }}">
                                  <x-validation-error field="linkedin"></x-validation-error>
                                </div>

                                <div class="form-group">
                                  <x-form-label field="twitter"></x-form-label>
                                  <input type="url" class="form-control" name="twitter" value="{{ $setting->twitter }}" id="twitter" placeholder="{{ __('keywords.twitter') }}">
                                  <x-validation-error field="twitter"></x-validation-error>
                                </div>

                                <div class="form-group">
                                  <x-form-label field="instagram"></x-form-label>
                                  <input type="url" class="form-control" name="instagram" value="{{ $setting->instagram }}" id="instagram" placeholder="{{ __('keywords.instagram') }}">
                                  <x-validation-error field="instagram"></x-validation-error>
                                </div>
                            </div>
                        </div>
                        <div class="text-right mt-3">
                          <x-submit-button>{{ __('keywords.save_settings') }}</x-submit-button>
                        </div>
                    </form>
                </div> <!-- end col-md-9 -->
            </div>
            </div>
          </div>
      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
@endsection
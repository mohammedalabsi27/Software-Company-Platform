<!doctype html>
<html lang="en">
    @include('admin.partials.head')

  <body class="vertical  light @if (LaravelLocalization::getCurrentLocale() == 'ar') rtl @endif  ">
    <div class="wrapper">
        @include('admin.partials.navbar')

        @include('admin.partials.sidebar')

      <main role="main" class="main-content">
        @yield('content')

        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
                    {{-- Notifucaion Modal  --}}
                    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="defaultModalLabel">{{ __('keywords.notifications') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body" id="notificationsModal">
                            @if (count(Auth::guard('admin')->user()->notifications))
                              <div class="list-group list-group-flush my-n3">
                                @foreach (Auth::guard('admin')->user()->notifications->take(5) as $notification)
                                <div
                                 class="list-group-item notification-item @if ($notification->read()) bg-transparent @else bg-light @endif"
                                 data-id="{{ $notification->id }}" style="cursor: pointer;">
                                  <div class="row align-items-center">
                                    <div class="col-auto">
                                      <span class="fe fe-box fe-24"></span>
                                    </div>
                                    <div class="col">
                                      <small><strong>{{ __('keywords.new_service_request') }}</strong></small>
                                      <div class="my-0 text-muted small">{{ $notification->data['message'] }}</div>
                                      <small class="badge badge-pill badge-light text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </div>
                                  </div>
                                </div>
                                @endforeach      
                            @endif
                            </div> <!-- / .list-group -->
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal" id="clearNotifications">{{ __('keywords.clear_all') }}</button>
                          </div>
                        </div>
                      </div>
                    </div>
      </main> <!-- main -->
    </div> <!-- .wrapper -->
    @include('admin.partials.scripts')
    <script>
      function confirmDelete(id){
        if(confirm('Are you sure you want to delete this record ?')){
          document.getElementById('deleteForm-'+id).submit();
        }
      }
    </script>

    <!-- إشعارات توستر -->
    <x-toastr></x-toastr>

  </body>
</html>
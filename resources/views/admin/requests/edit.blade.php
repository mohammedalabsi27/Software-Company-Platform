@extends('admin.master')

@section('title', __('keywords.edit_request'))

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="page-title">{{ __('keywords.edit_request') }} #{{ $request->id }}</h2>
        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('admin.requests.update',$request) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label>{{ __('keywords.status') }}</label>
                        <select name="status" class="form-control" required>
                            @foreach(['new', 'pending', 'in_progress', 'completed', 'rejected'] as $status)
                                <option value="{{ $status }}" {{ $request->status == $status ? 'selected' : '' }}>
                                    {{ ucfirst(str_replace('_', ' ', $status)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>{{ __('keywords.admin_note') }}</label>
                        <textarea name="admin_note" class="form-control" rows="4">{{ old('admin_note', $request->admin_note) }}</textarea>
                    </div>

                    <x-submit-button>{{ __('keywords.edit_request') }}</x-submit-button>
                    <a href="{{ route('admin.requests.index') }}" class="btn btn-secondary">{{ __('keywords.back') }}</a>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection

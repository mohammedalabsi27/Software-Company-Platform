@extends('front.master')

@section('title', 'Service')
@section('service-active', 'active')

@section('hero')
    <x-hero-section title="Request Service" subtitle="Request Service"></x-hero-section>
@endsection


@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">

            <h2 class="mb-4 text-center">Request a Service</h2>

            <div class="card shadow-sm rounded-3">
                <div class="card-body">

                    <form action="{{ route('user.requests.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        {{-- Hidden service ID --}}
                        <input type="hidden" name="service_id" value="{{ $service->id }}">

                        {{-- Service title readonly --}}
                        <div class="mb-3">
                            <label for="service_title" class="form-label">Service</label>
                            <input type="text" name="service_title" id="service_title" class="form-control" value="{{ $service->title }}" readonly>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label">Request Description</label>
                            <textarea name="description" id="description" rows="5" class="form-control" required>{{ old('description') }}</textarea>
                            <x-validation-error field="description"></x-validation-error>
                        </div>

                        {{-- Attachment --}}
                        <div class="mb-3">
                            <label for="attachment" class="form-label">Attachment (optional)</label>
                            <input type="file" name="attachment" id="attachment" class="form-control">
                            <x-validation-error field="attachment"></x-validation-error>
                        </div>

                        {{-- Submit button --}}

                        {{-- <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Submit Request</button>
                        </div> --}}
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                        <a href="{{ route('user.requests.index') }}" class="btn btn-secondary">Cancel</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
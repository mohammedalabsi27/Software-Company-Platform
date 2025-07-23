@extends('front.master')

@section('title', 'Service')
@section('service-active', 'active')

@section('hero')
    <x-hero-section title="Services" subtitle="Services"></x-hero-section>
@endsection

@section('content')

    <x-front-services-component></x-front-services-component>
    <!-- Testimonial Start -->
    <div class="container-xxl py-6">
        <div class="container">
            <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Testimonial</div>
                <h2 class="mb-5">What Our Clients Say!</h2>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('assets-front') }}/img/testimonial-1.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('assets-front') }}/img/testimonial-2.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('assets-front') }}/img/testimonial-3.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                    <p>Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="{{ asset('assets-front') }}/img/testimonial-4.jpg">
                        <div class="ps-3">
                            <h6 class="mb-1">Client Name</h6>
                            <small>Profession</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection

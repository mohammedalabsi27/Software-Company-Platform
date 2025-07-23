    <!-- Service Start -->
@if (count($services))
<div class="container-xxl py-6">
    <div class="container">
        <div class="mx-auto text-center wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <div class="d-inline-block border rounded-pill text-primary px-4 mb-3">Our Services</div>
            <h2 class="mb-5">We Provide Solutions On Your Business</h2>
        </div>
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100">
                        <div class="text-center p-4">
                            <!-- صورة الخدمة بتصميم جميل -->
                            <img 
                                src="{{ asset("storage/services/$service->image") }}" 
                                alt="service image" 
                                class="img-fluid rounded-circle mb-3" 
                                style="width: 100px; height: 100px; object-fit: cover;"
                            >
                            <!-- عنوان الخدمة -->
                            <h5 class="mb-2">{{ $service->title }}</h5>
                            <!-- وصف الخدمة -->
                            <p class="text-muted">{{ $service->description }}</p>

                            <!-- زر طلب الخدمة -->
                            <a href="{{ route('user.requests.create',$service) }}" class="btn btn-primary mt-2">
                                 Service Request
                            </a>
                        </div>
                    </div>
                </div>                  
            @endforeach
        </div>
    </div>
</div>
@endif
<!-- Service End -->

@if ($page_meta['page'] == 'Home')
    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item">
            <img src="{{ asset('assets/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Image">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-12 animated fadeInUp">
                            <div class="text-center">
                                <h4 class="text-primary text-uppercase fw-bold mb-4">Welcome To Website</h4>
                                <h1 class="display-4 text-uppercase text-white mb-4">Masjid Jami' Al-Muqarrabiin</h1>
                                <p class="fs-4 display-6">"<span class="text-warning">Bersatu</span> dalam <span
                                        class="text-warning">Aqidah</span><i class="bi bi-dot"></i><span
                                        class="text-warning">Berjamaah</span> dalam <span
                                        class="text-warning">Ibadah</span><i class="bi bi-dot"></i><span
                                        class="text-warning">Toleransi</span> dalam <span
                                        class="text-warning">Khilafiyah</span>"</p>
                                <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                    <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="#about">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->
@else
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">{{ $page_meta['header'] }}</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-primary">{{ $page_meta['page'] }}</li>
            </ol>
        </div>
    </div>
@endif

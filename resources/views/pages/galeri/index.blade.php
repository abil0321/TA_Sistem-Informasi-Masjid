@extends('layouts.app')

@section('content')
    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container py-1">
            <div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                {{-- <h4 class="text-primary">Our Services</h4> --}}
                <h1 class="display-5 mb-4">Galeri Kegiatan Masjid</h1>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src={{ asset('assets/img/service-1.jpg') }} class="img-fluid rounded-top w-100"
                                alt="Image">
                        </div>
                        <div class="rounded-bottom text-center p-3">
                            <a role="button" class="h4 d-inline-block"> Strategy Consulting</a>
                            {{-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                Excepturi facilis neque nesciunt similique officiis veritatis,
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src={{ asset('assets/img/service-2.jpg') }} class="img-fluid rounded-top w-100"
                                alt="Image">
                        </div>
                        <div class="rounded-bottom text-center p-3">
                            <a role="button" class="h4 d-inline-block">Financial Advisory</a>
                            {{-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                Excepturi facilis neque nesciunt similique officiis veritatis,
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src={{ asset('assets/img/service-3.jpg') }} class="img-fluid rounded-top w-100"
                                alt="Image">
                        </div>
                        <div class="rounded-bottom text-center p-3">
                            <a role="button" class="h4 d-inline-block">Managements</a>
                            {{-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                Excepturi facilis neque nesciunt similique officiis veritatis,
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src={{ asset('assets/img/service-4.jpg') }} class="img-fluid rounded-top w-100"
                                alt="Image">
                        </div>
                        <div class="rounded-bottom text-center p-3">
                            <a role="button" class="h4 d-inline-block">Supply Optimization</a>
                            {{-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                Excepturi facilis neque nesciunt similique officiis veritatis,
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src={{ asset('assets/img/service-5.jpg') }} class="img-fluid rounded-top w-100"
                                alt="Image">
                        </div>
                        <div class="rounded-bottom text-center p-3">
                            <a role="button" class="h4 d-inline-block">Hr Consulting</a>
                            {{-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                Excepturi facilis neque nesciunt similique officiis veritatis,
                            </p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src={{ asset('assets/img/service-6.jpg') }} class="img-fluid rounded-top w-100"
                                alt="Image">
                        </div>
                        <div class="rounded-bottom text-center p-3">
                            <a role="button" class="h4 d-inline-block">Marketing Consulting</a>
                            {{-- <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur, sint?
                                Excepturi facilis neque nesciunt similique officiis veritatis,
                            </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->
@endsection

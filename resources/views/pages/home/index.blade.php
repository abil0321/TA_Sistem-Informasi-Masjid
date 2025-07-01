@extends('layouts.app')

@section('content')
    <!-- Abvout Start -->
    <div class="container-fluid about py-5" id="about">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-7 wow fadeInLeft" data-wow-delay="0.2s">
                    <div>
                        <h2 class="text-primary">Selamat Datang</h2>
                        <h5 class="display-6 mb-4">Jamaah Masjid Jami' Al-Muqarrabiin
                        </h5>
                        <p class="mb-4">Masjid Jami' Al-Muqarrabiin adalah salah satu pusat ibadah dan kegiatan
                            keislaman
                            yang terletak di Perumahan Bukit Cengkeh 2, Kota Depok, Jawa Barat. Masjid ini berfungsi sebagai
                            tempat sholat lima waktu, sholat Jumat, serta berbagai kegiatan keagamaan seperti kajian Islam,
                            majelis taklim, dan pengajian rutin bagi jamaah dari berbagai kalangan. Dengan fasilitas yang
                            nyaman dan lingkungan yang asri, Masjid Jami' Al-Muqarrabiin menjadi pusat aktivitas sosial dan
                            keagamaan bagi masyarakat sekitar, mempererat ukhuwah Islamiyah serta mendukung pembinaan
                            spiritual bagi jamaahnya.
                        </p>
                        <div class="row">
                            <div class="col-sm-6">
                                <a href="{{ route('tentang') }}"
                                    class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0">Discover
                                    Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 wow fadeInRight" data-wow-delay="0.2s">
                    <div class="bg-primary rounded position-relative overflow-hidden">
                        <img src="{{asset('assets/img/masjid-4.jpg')}}"
                            class="img-fluid rounded w-100" alt="">
                        {{-- <img src="https://lh5.googleusercontent.com/p/AF1QipMbQQRTy7UAT055g3tgHBPJ_Ck85ob74hb5I6ck=w78-h150-n-k-no-nu"
                            class="img-fluid rounded w-100" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Jadwal Sholat Start -->
    <div class="container-fluid feature pb-5 mt-0">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h3 class="display-5 mb-2 text-primary">Jadwal Sholat Wilayah Kota Depok</h3>
            </div>
            <div class="row d-flex flex-column justify-content-center">
                <p class="col-7 m-auto mb-4 text-center">Berikut ini adalah jadwal sholat 5 waktu di wilayah Kota Depok,
                    Jawa Barat
                </p>
                <div class="d-flex justify-content-evenly flex-column flex-md-row align-items-center">
                    <div class="col-7 col-md-2 wow fadeInUp mb-4 mb-md-0" data-wow-delay="0.2s">
                        <div class="feature-item p-3">
                            <h4>Subuh</h4>
                            <p class="btn btn-primary rounded-pill py-2 px-4">{{ $data['subuh'] }}</p>
                        </div>
                    </div>
                    <div class="col-7 col-md-2 wow fadeInUp mb-4 mb-md-0" data-wow-delay="0.2s">
                        <div class="feature-item p-3">
                            <h4>Dzuhur</h4>
                            <p class="btn btn-primary rounded-pill py-2 px-4">{{ $data['dzuhur'] }}</p>
                        </div>
                    </div>
                    <div class="col-7 col-md-2 wow fadeInUp mb-4 mb-md-0" data-wow-delay="0.2s">
                        <div class="feature-item p-3">
                            <h4>Ashar</h4>
                            <p class="btn btn-primary rounded-pill py-2 px-4">{{ $data['ashar'] }}</p>
                        </div>
                    </div>
                    <div class="col-7 col-md-2 wow fadeInUp mb-4 mb-md-0" data-wow-delay="0.2s">
                        <div class="feature-item p-3">
                            <h4>Maghrib</h4>
                            <p class="btn btn-primary rounded-pill py-2 px-4">{{ $data['maghrib'] }}</p>
                        </div>
                    </div>
                    <div class="col-7 col-md-2 wow fadeInUp mb-md-0" data-wow-delay="0.2s">
                        <div class="feature-item p-3">
                            <h4>Isya</h4>
                            <p class="btn btn-primary rounded-pill py-2 px-4">{{ $data['isya'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jadwal Sholat End -->
@endsection

@extends('layouts.app')

@section('content')
    <div class="container-fluid service py-5">
        <div class="container py-1">
            <div class="text-center mx-auto pb-2 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h1 class="text-primary display-5 mb-4">Galeri Kegiatan Masjid</h1>
            </div>
            <div class="row g-4">
                @foreach ($data as $value)
                    @php $i = 0; @endphp
                    @foreach ($value->foto as $foto)
                        <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="service-item">
                                <div class="service-img" style="height: 200px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $value->foto[$i]) }}"
                                        class="img-fluid rounded-top w-100 h-100" style="object-fit: cover;" alt="Image">
                                </div>
                                <div class="rounded-bottom text-center p-3 bg-secondary ">
                                    <a role="button"
                                        class="h4 d-inline-block text-primary">{{ ucwords($value->nama_kegiatan) }}</a>
                                </div>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .service-img {
            height: 300px;
            overflow: hidden;
        }

        .service-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
@endsection

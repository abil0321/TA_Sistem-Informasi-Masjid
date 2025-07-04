<!-- resources/views/pages/blog/detail.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Blog Detail Start -->
    <div class="container-fluid blog py-4">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                {{-- <h4 class="text-primary">Detail Pengumuman</h4> --}}
                <h1 class="display-5" id="pengumuman-judul">Loading...</h1>
            </div>
            <div class="container">
                <div id="loading" class="text-center d-none">
                    Loading...
                </div>
                <div id="error-message" class="alert alert-danger d-none">
                </div>
                <div id="pengumuman-detail">
                    <!-- Data akan ditampilkan disini -->
                </div>
                <a href="{{ route('pengumuman') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
    <!-- Blog Detail End -->

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const id = {{ $data->id }};
            fetchData(id);
        });

        function fetchData(id) {
            const loadingElement = document.getElementById('loading');
            const errorElement = document.getElementById('error-message');
            const pengumumanJudulElement = document.getElementById('pengumuman-judul');
            const pengumumanDetail = document.getElementById('pengumuman-detail');
            loadingElement.classList.remove('d-none');

            const url = `https://masjid-muqorrobin.hostingphp.cloudapp.web.id/api/pengumuman_api/${id}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    loadingElement.classList.add('d-none');

                    // Periksa apakah data ada dan memiliki field yang dibutuhkan
                    if (!data || !data.data || !data.data.user || !data.data.kategoriPengumuman) {
                        throw new Error('Data tidak lengkap');
                    }

                    const pengumuman = data.data;

                    // Masukkan judul pengumuman ke dalam elemen dengan ID pengumuman-judul
                    pengumumanJudulElement.textContent = pengumuman.judul;

                    const html = `
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="card-text">${pengumuman.isi.replace(/<figcaption.*?<\/figcaption>/, '')}</p>
                                <div class="text-muted">
                                    <small>
                                        Posted by: ${pengumuman.user.name} |
                                        Kategori Pengumuman: ${pengumuman.kategoriPengumuman.nama} |
                                        Date: ${new Date(pengumuman.tanggal).toLocaleDateString()}
                                    </small>
                                </div>
                            </div>
                        </div>
                    `;

                    pengumumanDetail.innerHTML = html;
                })
                .catch(error => {
                    loadingElement.classList.add('d-none');
                    errorElement.classList.remove('d-none');
                    errorElement.textContent = 'Error: ' + error.message;
                });
        }
    </script>

    <!-- Script End -->
@endsection

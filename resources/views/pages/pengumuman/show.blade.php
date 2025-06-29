@extends('layouts.app')

@section('content')

    <!-- Blog Detail Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Detail Pengumuman</h4>
                <h1 class="display-5 mb-4">{{ $page_meta['header'] }}</h1>
            </div>
            <div class="container pb-5">
                <div id="loading" class="text-center">
                    Loading...
                </div>
                <div id="error-message" class="alert alert-danger d-none">
                </div>
                <div id="pengumuman-detail" class="mb-4">
                    <!-- Data akan ditampilkan disini -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Detail End -->

    <!-- Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pengumumanId = {{ $pengumuman_api }};
            fetchPengumumanById(pengumumanId);
        });

        function fetchPengumumanById(id) {
            const loadingElement = document.getElementById('loading');
            const errorElement = document.getElementById('error-message');
            const pengumumanDetail = document.getElementById('pengumuman-detail');

            loadingElement.classList.remove('d-none');

            const url = `http://127.0.0.1:8000/api/pengumuman_api/${id}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    loadingElement.classList.add('d-none');

                    document.getElementById('pengumuman-detail').innerHTML = `
                        <h3>${data.data.judul}</h3>
                        <p>${data.data.isi}</p>
                        <div class="text-muted">
                            <small>
                                Posted by: ${data.data.user.name} |
                                Date: ${new Date(data.data.tanggal).toLocaleDateString()}
                            </small>
                        </div>
                    `;
                })
                .catch(error => {
                    loadingElement.classList.add('d-none');
                    errorElement.classList.remove('d-none');
                    errorElement.textContent = 'Error: ' + error.message;
                });
        }
    </script>
@endsection

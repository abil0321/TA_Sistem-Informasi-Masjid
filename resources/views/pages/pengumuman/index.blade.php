<!-- resources/views/pages/blog/index.blade.php -->
@extends('layouts.app')

@section('content')

    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">{{ $page_meta['header'] }}</h4>
                <h1 class="display-5 mb-4">{{ $page_meta['header'] }}</h1>
                <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis
                    cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint
                    dolorem autem obcaecati, ipsam mollitia hic.
                </p>
            </div>
            <div class="container pb-5">
                <div id="loading" class="text-center d-none">
                    Loading...
                </div>
                <div id="error-message" class="alert alert-danger d-none">
                </div>
                <div id="pengumuman-list" class="mb-4">
                    <!-- Data akan ditampilkan disini -->
                </div>
                <div id="pagination" class="d-flex justify-content-end">
                    <button class="btn btn-primary" onclick="previousPage()" id="previousBtn">Previous</button>
                    <span class="mx-2">Page: <span id="currentPage">1</span></span>
                    <button class="btn btn-primary" onclick="nextPage()" id="nextBtn">Next</button>
                </div>
            </div>
            <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                <!-- Contoh blog item -->
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Script -->
    <script>
        let currentPage = 1;
        const perPage = 5; // Jumlah data per halaman

        document.addEventListener('DOMContentLoaded', function() {
            fetchData(currentPage);
        });

        function fetchData(page) {
            const loadingElement = document.getElementById('loading');
            const errorElement = document.getElementById('error-message');
            const pengumumanList = document.getElementById('pengumuman-list');
            loadingElement.classList.remove('d-none');

            const url = `http://127.0.0.1:8000/api/pengumuman_api?page=${page}&per_page=${perPage}`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    loadingElement.classList.add('d-none');
                    currentPage = page;
                    document.getElementById('currentPage').textContent = currentPage;

                    const html = data.data.map(item => `
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/pengumuman/${item.id}" class="text-decoration-none">${item.judul}</a>
                                </h5>
                                <p class="card-text">${item.isi.substring(0, 100)}...</p>
                                <div class="text-muted">
                                    <small>
                                        Posted by: ${item.user.name} |
                                        Kategor Pengumuman: ${item.kategori_pengumuman_id.nama} |
                                        Date: ${new Date(item.tanggal).toLocaleDateString()}
                                    </small>
                                </div>
                            </div>
                        </div>
                    `).join('');

                    pengumumanList.innerHTML = html;

                    const prevBtn = document.getElementById('previousBtn');
                    const nextBtn = document.getElementById('nextBtn');
                    prevBtn.disabled = page === 1;
                    nextBtn.disabled = !data.links.next;
                })
                .catch(error => {
                    loadingElement.classList.add('d-none');
                    errorElement.classList.remove('d-none');
                    errorElement.textContent = 'Error: ' + error.message;
                });
        }

        function nextPage() {
            fetchData(currentPage + 1);
        }

        function previousPage() {
            fetchData(currentPage - 1);
        }
    </script>

    <!-- Script End -->
@endsection

<!-- resources/views/pages/blog/index.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Blog Start -->
    <div class="container-fluid blog py-5">
        <div class="container py-5">
            {{-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            </div> --}}
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
            {{-- <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
                <!-- Contoh blog item -->
            </div> --}}
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

            console.log("Fetching data from: ", url); // Cek apakah URL benar


            fetch(url)
                .then(response => {
                    console.log("Fetch Response:", response);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log("API Data Received:", data);
                    loadingElement.classList.add('d-none');
                    currentPage = page;
                    document.getElementById('currentPage').textContent = currentPage;

                    const html = data.data.map(item => {
                        // Menghapus tag <img> dan elemen gambar lainnya dari isi pengumuman
                        let isiText = item.isi.replace(/<img[^>]*>/g, '');
                        let isiText2 = isiText.replace(/<figcaption.*?<\/figcaption>/, '');
                        let text = isiText2.replace(/<[^>]*>/g, '').substring(0, 250);

                        return `
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="/pengumuman/${item.id}" class="text-decoration-none">${item.judul}</a>
                                    </h5>
                                    <p class="card-text">${text}...</p>
                                    <div class="text-muted">
                                        <small>
                                            Posted by: ${item.user.name} |
                                            Kategori Pengumuman: ${item.kategoriPengumuman.nama || 'undefined'} |
                                            Date: ${new Date(item.tanggal).toLocaleDateString()}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        `;
                    }).join('');


                    pengumumanList.innerHTML = html;

                    const prevBtn = document.getElementById('previousBtn');
                    const nextBtn = document.getElementById('nextBtn');
                    prevBtn.disabled = page === 1;
                    nextBtn
                        .disabled = !data.links.next;
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

@extends('layouts.app')

@section('content')
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="container pb-5">
                <h2 class="text-primary text-center">Pengeluaran Keuangan</h2>
                <div id="loading" class="text-center d-none">
                    Loading...
                </div>
                <div id="error-message" class="alert alert-danger d-none">
                </div>
                <div id="pengeluaran-list" class="mb-4">
                    <!-- Data akan ditampilkan disini -->
                </div>
                <div id="pagination" class="d-flex justify-content-end">
                    <button class="btn btn-primary" onclick="previousPage()" id="previousBtn">Previous</button>
                    <span class="mx-2">Page: <span id="currentPage">1</span></span>
                    <button class="btn btn-primary" onclick="nextPage()" id="nextBtn">Next</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentPage = 1;
        const perPage = 5; // Jumlah data per halaman

        document.addEventListener('DOMContentLoaded', function() {
            fetchData(currentPage);
        });

        function fetchData(page) {
            const loadingElement = document.getElementById('loading');
            const errorElement = document.getElementById('error-message');
            const pengeluaranList = document.getElementById('pengeluaran-list');
            loadingElement.classList.remove('d-none');

            const url = `https://masjid-muqorrobin.hostingphp.cloudapp.web.id/api/kegiatan_api?page=${page}&per_page=${perPage}`;

            console.log("Fetching data from: ", url); // Cek apakah URL benar

            fetch(url)
                .then(response => {
                    console.log("Fetch Response:", response);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(responseData => {
                    console.log("API Data Received:", responseData);
                    loadingElement.classList.add('d-none');
                    currentPage = page;
                    document.getElementById('currentPage').textContent = currentPage;

                    let pengeluaran = responseData.data; // Ambil data dari API

                    console.log("pengeluaran Data:", pengeluaran);
                    console.log("Jumlah pengeluaran:", pengeluaran.length);

                    let tableContent = '';

                    if (!Array.isArray(pengeluaran) || pengeluaran.length === 0) {
                        tableContent = `
                    <div class="alert alert-warning text-center">
                        <strong>Tidak ada data pengeluaran.</strong>
                    </div>
                `;
                    } else {
                        tableContent = `
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col-1 text-center">No</th>
                                        <th scope="col" class="col-3 text-center">Tanggal</th>
                                        <th scope="col" class="col-4 text-center">Nama Kegiatan</th>
                                        <th scope="col" class="col-2 text-center">Kategori</th>
                                        <th scope="col" class="col-2 text-center">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${pengeluaran.map((pl, index) => `
                                                    <tr>
                                                        <td scope="row" class="text-center">${(currentPage - 1) * perPage + index + 1}</td>
                                                        <td class="text-center">${pl.tanggal_mulai}</td>
                                                        <td class="text-center">${pl.nama_kegiatan}</td>
                                                        <td class="text-center">${pl.kategori_kegiatan_id?.nama}</td>
                                                        <td class="text-center">Rp ${new Intl.NumberFormat('id-ID').format(pl.jumlah) || 0}
                                                        </td>
                                                    </tr>
                                                `).join('')}
                                </tbody>
                            </table>
                        </div>
                `;
                    }

                    pengeluaranList.innerHTML = tableContent;

                    // Pagination Handling
                    const prevBtn = document.getElementById('previousBtn');
                    const nextBtn = document.getElementById('nextBtn');
                    prevBtn.disabled = page === 1;
                    nextBtn.disabled = !responseData.links.next;
                })
                .catch(error => {
                    console.error("Fetch Error:", error);
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
@endsection

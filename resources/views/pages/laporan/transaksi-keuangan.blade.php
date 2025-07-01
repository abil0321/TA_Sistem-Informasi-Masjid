@extends('layouts.app')

@section('content')
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="container pb-5">
                <h2 class="text-primary text-center">Transaksi Keuangan</h2>
                <div id="loading" class="text-center d-none">
                    Loading...
                </div>
                <div id="error-message" class="alert alert-danger d-none">
                </div>
                <div id="transaksi-list" class="mb-4">
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
            const transaksiList = document.getElementById('transaksi-list');
            loadingElement.classList.remove('d-none');

            const url = `http://127.0.0.1:8000/api/transaksi_api?page=${page}&per_page=${perPage}`;

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

                    let transaksi = responseData.data; // Ambil data dari API

                    console.log("Transaksi Data:", transaksi);
                    console.log("Jumlah Transaksi:", transaksi.length);

                    let tableContent = '';

                    if (!Array.isArray(transaksi) || transaksi.length === 0) {
                        tableContent = `
                    <div class="alert alert-warning text-center">
                        <strong>Tidak ada data transaksi.</strong>
                    </div>
                `;
                    } else {
                        tableContent = `
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="col-3 text-center">Tanggal</th>
                                    <th scope="col" class="col-2 text-center">Jumlah</th>
                                    <th scope="col" class="col-5 text-center">Keterangan</th>
                                    <th scope="col" class="col-2 text-center">Saldo</th>
                                </tr>
                            </thead>
                            <tb>
                                ${transaksi.map((tk, index) => `
                                        <tr>
                                            <td class="text-center">${(currentPage - 1) * perPage + index + 1}</td>
                                            <td class="text-center">${tk.tanggal}</td>
                                            <td class="text-center">Rp ${new Intl.NumberFormat('id-ID').format(tk.donasi_id?.jumlah ?? tk.kegiatan_id?.jumlah ?? 0)}</td>
                                            <td class="text-center">${tk.keterangan}</td>
                                            <td class="text-center">Rp ${new Intl.NumberFormat('id-ID').format(tk.saldo || 0)}</td>
                                        </tr>
                                    `).join('')}
                            </tb
                        </ta
                    </div>
                `;
                    }

                    transaksiList.innerHTML = tableContent;

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

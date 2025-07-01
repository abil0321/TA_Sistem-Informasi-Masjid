@extends('layouts.app')

@section('content')
    <div class="container-fluid about">
        <div class="container py-5">
            <div class="container pb-5">
                <h2 class="text-primary text-center">Form Infaq & Shodaqoh</h2>
                <div class="row col-6 align-items-center mx-auto mt-5">
                    <form action="/donasi/konfirmasi" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_donatur" class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_donatur" class="form-control" id="nama_donatur"
                                aria-describedby="namaHelp">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">Nomor Telepon</label>
                            <input type="number" class="form-control" name="no_telp" id="no_telp"
                                aria-describedby="notelpHelp">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah"
                                aria-describedby="jumlahHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('jumlah').addEventListener('input', function(event) {
            let value = this.value.replace(/[^0-9]/g, '');
            value = new Intl.NumberFormat('id-ID').format(value);
            this.value = 'Rp ' + value;
        });
    </script>
@endsection

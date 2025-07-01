@extends('layouts.app')

@section('content')
    <div class="container-fluid about">
        <div class="container py-5">
            <div class="container pb-5">
                <h2 class="text-primary text-center">Invoice Infaq & Shodaqoh</h2>
                <div class="row col-5 align-items-center mx-auto mt-5 gap-3">
                    <div class="card">
                        <div class="card-body d-flex justify-content-center align-items-center flex-column">
                            <h4 class="card-title text-center">Detail Infaq & Shodaqoh</h4>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td> : {{ $donasi->nama_donatur }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> : {{ $donasi->email }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor Telepon</td>
                                    <td> : {{ $donasi->no_telp }}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Infaq</td>
                                    <td> : Rp {{ number_format($donasi->jumlah, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        :
                                        @if ($donasi->status == 'PENDING')
                                            <span class="badge bg-warning text-dark">{{ $donasi->status }}</span>
                                        @elseif ($donasi->status == 'DONE')
                                            <span class="badge bg-success">{{ $donasi->status }}</span>
                                        @else
                                            <span class="badge bg-danger">{{ $donasi->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

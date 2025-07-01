@extends('layouts.app')

@section('content')
    <div class="container-fluid about">
        <div class="container py-5">
            <div class="container pb-5">
                <h2 class="text-primary text-center">Konfirmasi Infaq & Shodaqoh</h2>
                <div class="row col-6 align-items-center mx-auto mt-5 gap-3">
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
                    </table>
                    <button class="btn btn-success" id="pay-button">Infaq Sekarang!</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/donasi/invoice/{{ $donasi->id }}';
                    console.log(result);
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("waiting your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection

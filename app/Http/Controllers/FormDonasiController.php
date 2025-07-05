<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use Illuminate\Http\Request;

class FormDonasiController extends Controller
{
    public function index()
    {
        return view('pages.formDonasi.index', [
            // 'data' => $data,
            'page_meta' => [
                'page' => 'Form Donasi',
                'header' => 'Form Infaq & Shodaqoh',
                'foto' => 'assets/img/masjid-10.jpg',
            ],
        ]);
    }

    public function konfirmasi(Request $request)
    {
        // $data = $request->all();
        // dd($data);
        // $request->request->add(['user_id' => 1]);
        $jumlah = str_replace(['Rp ', '.'], '', $request->jumlah);
        $jumlahAkhir = (int)$jumlah;
        // dd($request->all());

        $donasi = Donasi::create([
            'nama_donatur' => $request->nama_donatur,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'jumlah' => $jumlahAkhir,
            'status' => 'PENDING',
            'user_id' => 1,
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-qGin1e_8LpPnWFLw_UPhQHh-';
        // \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $donasi->id,
                'gross_amount' => $jumlahAkhir,
            ),
            'customer_details' => array(
                'first_name' => $request->nama_donatur,
                'last_name' => '',
                'Email' => $request->email,
                'Nomor Telepon' => $request->no_telp,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // dd($snapToken);
        return view('pages.formDonasi.konfirmasi', [
            'page_meta' => [
                'page' => 'Form Donasi',
                'header' => 'Form Infaq & Shodaqoh',
                'foto' => 'assets/img/masjid-10.jpg',
            ],
            'snapToken' => $snapToken,
            'donasi' => $donasi,
        ]);
    }

    public function callback(Request $request){
        $serverKey = 'SB-Mid-server-qGin1e_8LpPnWFLw_UPhQHh-';
        // $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture' or $request->transaction_status == 'settlement'){
                $donasi = Donasi::find($request->order_id);
                $donasi->update([
                    'status' => 'DONE',
                ]);
            }
        }
    }

    public function invoice($id)
    {
        $donasi = Donasi::find($id);
        return view('pages.formDonasi.invoice', [
            'page_meta' => [
                'page' => 'Form Donasi',
                'header' => 'Form Infaq & Shodaqoh',
                'foto' => 'assets/img/masjid-10.jpg',
            ],
            'donasi' => $donasi,
        ]);
    }
}

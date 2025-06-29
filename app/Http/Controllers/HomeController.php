<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $cityId = 1225; // ID kota Depok, Jawa Barat
        $year = date('Y');
        $month = date('m');

        $apiUrl = "https://api.myquran.com/v2/sholat/jadwal/{$cityId}/{$year}/{$month}";

        $response = Http::get($apiUrl);

        if ($response->successful()) {
            $data = $response->json();

            $today = date('d');
            $prayerTimes = collect($data['data']['jadwal'])
                ->where('date', date('Y-m-d'))
                ->first();

            return view('pages.home.index', [
                'data' => $prayerTimes,
                'page_meta' => [
                    'page' => 'Home',
                    'header' => 'Home',
                ],
            ]);
        } else {
            return response()->json(['error' => 'Gagal mengambil data jadwal sholat'], 500);
        }
    }
}

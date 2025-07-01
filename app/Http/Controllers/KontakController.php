<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KontakController extends Controller
{
    public function index()
    {
        return view('pages.kontak.index', [
            'page_meta' => [
                'page' => 'Kontak',
                'header' => 'Kontak Masjid',
                'foto' => 'assets/img/masjid-9.jpg',
            ]
        ]);
    }

}

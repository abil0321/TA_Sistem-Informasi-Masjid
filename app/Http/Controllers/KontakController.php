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
                'header' => 'Kontak Masjid'
            ]
        ]);
    }

    public function show($id)
    {
        return view('pages.blog.show', [
            'page_meta' => [
                'page' => 'Blog Detail',
                'header' => 'Detail Pengumuman'
            ],
            'pengumuman_api' => $id
        ]);
    }
}

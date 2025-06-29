<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangController extends Controller
{
    public function index()
    {
        return view('pages.tentang.index', [
            'page_meta' => [
                'page' => 'Tentang',
                'header' => 'Tentang Masjid',
            ],
        ]);
    }
}

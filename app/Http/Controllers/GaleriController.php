<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        return view('pages.galeri.index',[
            'page_meta' => [
                'page' => 'Galeri',
                'header' => 'Galeri Kegiatan',
            ],
        ]);
    }
}

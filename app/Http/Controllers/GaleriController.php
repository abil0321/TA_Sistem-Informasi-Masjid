<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $data = Kegiatan::all();
        return view('pages.galeri.index',[
            'data' => $data,
            'page_meta' => [
                'page' => 'Galeri',
                'header' => 'Galeri Kegiatan',
                'foto' => 'assets/img/masjid-4.jpg',
            ],
        ]);
    }
}

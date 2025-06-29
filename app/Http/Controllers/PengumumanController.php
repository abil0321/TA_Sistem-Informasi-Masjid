<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('pages.pengumuman.index', [
            'page_meta' => [
                'page' => 'Pengumuman',
                'header' => 'Pengumuman Masjid'
            ]
        ]);
    }

    public function show($id)
    {
        return view('pages.pengumuman.detail', [
            'id' => $id,
            'page_meta' => [
                'page' => 'Pengumuman',
                'header' => 'Detail Pengumuman'
            ]
        ]);
    }
}

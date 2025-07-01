<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $datas = Pengumuman::with('kategoriPengumuman', 'user')->get();
        return view('pages.pengumuman.index', [
            // 'data' => $datas,
            'page_meta' => [
                'page' => 'Pengumuman',
                'header' => 'Pengumuman Masjid',
                'foto' => 'assets/img/masjid-8.jpg',
            ]
        ]);
    }

    public function show($id)
    {
        $data = Pengumuman::findOrFail($id);
        return view('pages.pengumuman.detail', [
            'data' => $data,
            'page_meta' => [
                'page' => 'Pengumuman',
                'header' => 'Detail Pengumuman',
                'foto' => 'assets/img/masjid-8.jpg',
            ]
        ]);
    }
}

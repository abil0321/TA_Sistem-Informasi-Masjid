<?php

namespace App\Http\Resources\Kegiatan;

use App\Http\Resources\KategoriKegiatan\KategoriKegiatanResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KegiatanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_kegiatan' => $this->nama_kegiatan,
            'deskripsi' => $this->deskripsi,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'lokasi' => $this->lokasi,
            'jumlah' => $this->jumlah,
            'foto' => $this->foto,
            'kategori_kegiatan_id' => new KategoriKegiatanResource($this->kategoriKegiatan),
            'user_id' => new UserResource($this->user),
        ];
    }
}

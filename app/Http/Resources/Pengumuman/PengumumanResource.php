<?php

namespace App\Http\Resources\Pengumuman;

use App\Http\Resources\KategoriPengumuman\KategoriPengumumanResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PengumumanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'judul' => $this->judul,
            'isi' => $this->isi,
            'kategori_pengumuman_id' => new KategoriPengumumanResource($this->kategoriPengumuman),
            'referensi' => $this->referensi,
            'tanggal' => $this->tanggal,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->user),
        ];
    }
}

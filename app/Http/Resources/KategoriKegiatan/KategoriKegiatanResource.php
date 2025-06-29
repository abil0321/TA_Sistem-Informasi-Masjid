<?php

namespace App\Http\Resources\KategoriKegiatan;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KategoriKegiatanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama' => $this->nama
        ];
    }
}

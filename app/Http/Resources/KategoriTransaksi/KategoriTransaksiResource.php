<?php

namespace App\Http\Resources\KategoriTransaksi;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KategoriTransaksiResource extends JsonResource
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

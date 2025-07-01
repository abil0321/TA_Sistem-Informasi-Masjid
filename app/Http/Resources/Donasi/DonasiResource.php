<?php

namespace App\Http\Resources\Donasi;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DonasiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nama_donatur' => $this->nama_donatur,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'jumlah' => $this->jumlah,
            'tanggal' => $this->created_at->format('d M Y'),
            'user_id' => new UserResource($this->user),
        ];
    }
}

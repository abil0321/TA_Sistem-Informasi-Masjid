<?php

namespace App\Http\Resources\Transaksi;

use App\Http\Resources\Donasi\DonasiResource;
use App\Http\Resources\KategoriTransaksi\KategoriTransaksiResource;
use App\Http\Resources\Kegiatan\KegiatanResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransaksiResource extends JsonResource
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
            'saldo' => $this->saldo,
            'tanggal' => $this->tanggal,
            'keterangan' => $this->keterangan,
            'kategori_transaksi_id' => new KategoriTransaksiResource($this->kategoriTransaksi),
            'user_id' => new UserResource($this->user),
            'kegiatan_id' => new KegiatanResource($this->kegiatan),
            'donasi_id' => new DonasiResource($this->donasi),
        ];
    }
}

<?php

namespace App\Http\Resources\Transaksi;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransaksiCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => TransaksiResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count(),
                // 'total-saldo' => $this->collection->sum('saldo'),
            ],
        ];
    }
}

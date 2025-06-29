<?php

namespace App\Http\Resources\KategoriPengumuman;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class KategoriPengumumanCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => KategoriPengumumanResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count(),
            ],
        ];
    }
}

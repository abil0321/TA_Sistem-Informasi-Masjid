<?php

namespace App\Http\Resources\Donasi;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DonasiCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => DonasiResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count(),
                'total_donasi' => $this->collection->sum('jumlah')
            ],
        ];
    }
}

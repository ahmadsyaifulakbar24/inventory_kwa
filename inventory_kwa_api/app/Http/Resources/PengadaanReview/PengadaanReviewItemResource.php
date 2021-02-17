<?php

namespace App\Http\Resources\PengadaanReview;

use App\Http\Resources\PengadaanRequest\PengadaanRequestItemResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PengadaanReviewItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pengadaan_request_item' => new PengadaanRequestItemResource($this->pengadaan_request_item),
            'price' => $this->price
        ];
    }
}
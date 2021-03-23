<?php

namespace App\Http\Resources\PengadaanReview;

use App\Http\Resources\SupplierResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PengadaanReviewResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'supplier_id' => new SupplierResource($this->supplier),
            'first_approved_at' => !empty($this->first_approved_at) ? \Carbon\Carbon::parse($this->first_approved_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') : NULL,
            'second_approved_at' => !empty($this->second_approved_at) ? \Carbon\Carbon::parse($this->second_approved_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') : NULL,
            'status' => $this->status,
            'pengadaan_review_items' => PengadaanReviewItemResource::collection($this->pengadaan_review_item),
            'pengadaan_review_files' => PengadaanReviewFileResource::collection($this->pengadaan_review_file),
            'created_at' => \Carbon\Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
}
<?php

namespace App\Http\Resources\PengadaanReview;

use App\Http\Resources\ParamResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PengadaanReviewFileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type_file' => new ParamResource($this->type_file),
            'file' => !empty($this->file) ? url('images/pembelian/'.$this->file) : NULL,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
}
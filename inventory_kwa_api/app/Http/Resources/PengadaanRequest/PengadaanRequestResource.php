<?php

namespace App\Http\Resources\PengadaanRequest;

use App\Http\Resources\ParamResource;
use App\Models\PengadaanRequest;
use Database\Seeders\ParamSeeder;
use Illuminate\Http\Resources\Json\JsonResource;

class PengadaanRequestResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'jenis_pengadaan' => new ParamResource($this->jenis_pengadaan),
            'pengadaan_request_item' => PengadaanRequestItemResource::collection($this->pengadaan_request_item),
            'created_at' => \Carbon\Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
}
<?php

namespace App\Http\Resources\PengadaanRequest;

use App\Http\Resources\Alker\MainAlkerResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\ParamResource;
use Database\Seeders\ParamSeeder;
use Illuminate\Http\Resources\Json\JsonResource;

class PengadaanRequestItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'main_alker' => !empty($this->main_alker) ? new MainAlkerResource($this->main_alker) : NULL,
            'item_id' => !empty($this->item) ? new ItemResource($this->item) : NULL,
            'total' => $this->total,
            'status' => $this->status,
            'approved_at' => \Carbon\Carbon::parse($this->approved_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
}
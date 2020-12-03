<?php

namespace App\Http\Resources\Alker;

use Illuminate\Http\Resources\Json\JsonResource;

class AlkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'main_alker' => new MainAlkerResource($this->main_alker),
            'kode_alker' => $this->kode_alker,
            'status' => $this->status,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
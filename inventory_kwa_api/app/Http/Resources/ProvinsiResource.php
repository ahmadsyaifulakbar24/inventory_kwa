<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinsiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provinsi' => $this->provinsi
        ];
    }
}
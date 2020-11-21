<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KabKotaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provinsi' => new ProvinsiResource($this->provinsi),
            'kab_kota' => $this->kab_kota,
            'ibu_kota' => $this->ibu_kota,
        ];
    }
}
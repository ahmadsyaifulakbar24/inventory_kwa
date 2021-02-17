<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'param' => $this->param,
        ];
    }
}
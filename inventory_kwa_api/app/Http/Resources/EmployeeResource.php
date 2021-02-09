<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nik' => $this->nik,
            'name' => $this->name,
            'status' => $this->status,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
        ];
    }
}
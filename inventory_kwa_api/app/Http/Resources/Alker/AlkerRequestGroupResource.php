<?php

namespace App\Http\Resources\Alker;

use App\Http\Resources\EmployeeResource;
use App\Models\Alker;
use App\Models\DetailAlker;
use App\Models\Employee;
use App\Models\Param;
use Illuminate\Http\Resources\Json\JsonResource;

class AlkerRequestGroupResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'alker_id' => $this->alker_id,
            'kode_alker' => $this->kode_alker,
            'nama_barang' => $this->nama_barang,
            'total' => $this->total
        ];
    }
}
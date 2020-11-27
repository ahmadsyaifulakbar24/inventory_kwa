<?php

namespace App\Http\Resources\Alker;

use App\Http\Resources\EmployeeResource;
use App\Models\DetailAlker;
use App\Models\Employee;
use App\Models\Param;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailAlkerResource extends JsonResource
{
    public function toArray($request)
    {
        $sto = Param::find($this->detail_alker->sto_id);
        $teknisi = Employee::find($this->detail_alker->teknisi_id);
        return [
            'id' => $this->id,
            'main_alker' => new MainAlkerResource($this->main_alker),
            'kode_alker' => $this->kode_alker,
            'sto' => [
                'id' => $sto->id,
                'sto' => $sto->param
            ],
            'teknisi' => new EmployeeResource($teknisi),
            'kegunaan' => $this->detail_alker->kegunaan,
        ];
    }
}
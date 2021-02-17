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
        !empty($this->detail_alker->sto_id) ? $sto = Param::find($this->detail_alker->sto_id) : $sto = '';
        !empty($this->detail_alker->teknisi_id) ? $teknisi = Employee::find($this->detail_alker->teknisi_id) : $teknisi = '';
        return [
            'id' => $this->id,
            'main_alker' => new MainAlkerResource($this->main_alker),
            'kode_alker' => $this->kode_alker,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
            'front_picture' => !empty($this->front_picture) ? url('images/alker/'.$this->front_picture) : NULL,
            'back_picture' => !empty($this->back_picture) ? url('images/alker/'.$this->back_picture) : NULL,
            'sto' => [
                'id' => !empty($sto->id) ? $sto->id : '',
                'sto' => !empty($sto->param) ? $sto->param : ''
            ],
            'teknisi' => !empty($teknisi) ? new EmployeeResource($teknisi) : '',
            'kegunaan' => !empty($this->detail_alker->kegunaan) ? $this->detail_alker->kegunaan : '',
        ];
    }
}
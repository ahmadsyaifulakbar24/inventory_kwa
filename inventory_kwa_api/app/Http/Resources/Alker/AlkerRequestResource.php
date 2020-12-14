<?php

namespace App\Http\Resources\Alker;

use App\Http\Resources\EmployeeResource;
use App\Models\Alker;
use App\Models\DetailAlker;
use App\Models\Employee;
use App\Models\Param;
use Illuminate\Http\Resources\Json\JsonResource;

class AlkerRequestResource extends JsonResource
{
    public function toArray($request)
    {
        $alker = Alker::find($this->alker_id);
        if($this->keterangan_id == 28) {
            $detail_alker = DetailAlker::where('alker_id', $this->alker_id)->first();
            $sto = Param::find($detail_alker['sto_id']);
            $teknisi = Employee::find($detail_alker['teknisi_id']);
            $kegunaan = $detail_alker->kegunaan;
        } else {
            $sto = Param::find($this->sto_id);
            $teknisi = Employee::find($this->teknisi_id);
            $kegunaan = $this->kegunaan;
        }
        $keterangan = Param::find($this->keterangan_id);
        return [
            'id' => $this->id,
            'alker' => new AlkerResource($alker),
            'sto' => [
                'id' => $sto->id,
                'sto' => $sto->param
            ],
            'teknisi' => new EmployeeResource($teknisi),
            'kegunaan' => $kegunaan,
            'keterangan' => [
                'id' => $keterangan->id,
                'keterangan' => $keterangan->param
            ],
            'front_picture' => !empty($this->front_picture) ? url('images/alker/'.$this->front_picture) : '',
            'back_picture' => !empty($this->back_picture) ? url('images/alker/'.$this->back_picture) : '',
            'status' => $this->status,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
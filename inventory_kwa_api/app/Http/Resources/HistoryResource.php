<?php

namespace App\Http\Resources;

use App\Http\Resources\Alker\MainAlkerResource;
use App\Models\Alker;
use App\Models\AlkerRequest;
use App\Models\DetailAlker;
use App\Models\Employee;
use App\Models\MainAlker;
use App\Models\Param;
use Illuminate\Http\Resources\Json\JsonResource;

class HistoryResource extends JsonResource
{
    public function toArray($request)
    {
        $alker = Alker::find($this->alker_id);
        $main_alker = MainAlker::find($alker->main_alker_id);
        $detail_alker_resource = [
            'id' => $alker->id,
            'main_alker' => new MainAlkerResource($main_alker),
            'kode_alker' => $alker->kode_alker,
            'status' => $alker->status,
            'keterangan' => $alker->keterangan,
            'front_picture' => !empty($alker->front_picture) ? url('images/alker/'.$alker->front_picture) : NULL,
            'back_picture' => !empty($alker->back_picture) ? url('images/alker/'.$alker->back_picture) : NULL,
            'created_at' => \Carbon\Carbon::parse($alker->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
        if(!empty($this->alker_request_id)) {
            $alker_request = AlkerRequest::find($this->alker_request_id);
            if($alker_request->keterangan_id == 28) {
                $detail_alker = DetailAlker::where('alker_id', $alker_request->alker_id)->first();
                $sto = Param::find($detail_alker['sto_id']);
                $teknisi = Employee::find($detail_alker['teknisi_id']);
            } else {
                $sto = Param::find($alker_request->sto_id);
                $teknisi = Employee::find($alker_request->teknisi_id);
            }
            $keterangan = Param::find($alker_request->keterangan_id);
            return [
                'id' => $this->id,
                'alker' => $detail_alker_resource,
                'alker_request' => [
                    'id' => $alker_request->id,
                    'sto' => [
                        'id' => $sto['id'],
                        'sto' => $sto['param']
                    ],
                    'teknisi' => new EmployeeResource($teknisi),
                    'kegunaan' => !empty($alker_request->kegunaan) ? $alker_request->kegunaan : $detail_alker['kegunaan'],
                    'keterangan' => [
                        'id' => $keterangan->id,
                        'keterangan' => $keterangan->param
                    ],
                    'front_picture' => !empty($alker_request->front_picture) ? url('images/alker/'.$alker_request->front_picture) : '',
                    'back_picture' => !empty($alker_request->back_picture) ? url('images/alker/'.$alker_request->back_picture) : '',
                    'status' => $alker_request->status,
                    'created_at' => \Carbon\Carbon::parse($alker_request->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
                ],
                'status' => $this->status,
                'created_at' => \Carbon\Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ];
        } else {
            return [
                'id' => $this->id,
                'alker' => $detail_alker_resource,
                'status' => $this->status,
                'created_at' => \Carbon\Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ];
        }
    }
}
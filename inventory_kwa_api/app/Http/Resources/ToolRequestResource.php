<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ToolRequestResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'item_id' => $this->item,
            'sto_id' => $this->sto,
            'teknisi_id' => $this->teknisi,
            'jenis' => $this->jenis,
            'keterangan_id' => $this->keterangan,
            'front_picture' => $this->front_picture ? null : url('images/tools/'.$this->front_picture),
            'back_picture' => $this->back_picture == null ? null : url('images/tools/'.$this->back_picture),
            'status' => $this->status,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
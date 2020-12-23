<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->pivot->id,
            'project_id' => $this->pivot->project_id,
            'item' => [
                'id' => $this->id,
                'kode' => $this->kode,
                'nama_barang' => $this->nama_barang,
                'keterangan' => $this->keterangan,
                'satuan' => $this->satuan,
                'jenis' => $this->jenis,
                'stock' => $this->stock,
            ],
            'quantity' => $this->pivot->quantity,
            'status' => $this->pivot->status,
            'category' => $this->pivot->category,
            'created_at' => \Carbon\Carbon::parse($this->pivot->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
}
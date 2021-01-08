<?php

namespace App\Http\Resources\Alker;

use App\Models\Alker;
use Illuminate\Http\Resources\Json\JsonResource;

class MainAlkerResource extends JsonResource
{
    public function toArray($request)
    {
        $main_alker = $this->id;
        $alker_total = Alker::where('main_alker_id', $main_alker)->count();
        return [
            'id' => $this->id,
            'kode_main_alker' => $this->kode_main_alker,
            'nama_barang' => $this->nama_barang,
            'satuan' => $this->satuan,
            'total_alker_gudang' => !empty($alker_total) ? $alker_total : 0,
        ];
    }
}
<?php

namespace App\Http\Resources;

use App\Models\Supplier;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectItemResource extends JsonResource
{
    public function toArray($request)
    {
        $supplier = Supplier::find($this->pivot->supplier_id);
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
            'supplier' => new SupplierResource($supplier),
            'image1' => !empty($this->pivot->image1) ? url('images/items/'.$this->pivot->image1) : NULL,
            'image2' => !empty($this->pivot->image2) ? url('images/items/'.$this->pivot->image2) : NULL,
            'url' => !empty($this->pivot->url) ? $this->pivot->url : null,
            'date_approved' => !empty($this->pivot->date_approved) ? \Carbon\Carbon::parse($this->pivot->date_approved)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s') : NULL,
            'created_at' => \Carbon\Carbon::parse($this->pivot->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
}
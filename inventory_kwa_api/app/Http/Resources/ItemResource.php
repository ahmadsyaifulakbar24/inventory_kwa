<<<<<<< HEAD
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kode' => $this->kode,
            'nama_barang' => $this->nama_barang,
            'keterangan' => $this->keterangan,
            'satuan' => $this->satuan,
            'jenis' => $this->jenis,
            'stock' => $this->stock,
        ];
    }
=======
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kode' => $this->kode,
            'nama_barang' => $this->nama_barang,
            'keterangan' => $this->keterangan,
            'satuan' => $this->satuan,
            'jenis' => $this->jenis,
            'stock' => $this->stock,
        ];
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
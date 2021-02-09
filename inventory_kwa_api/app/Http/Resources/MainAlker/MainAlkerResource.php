<<<<<<< HEAD
<?php

namespace App\Http\Resources\MainAlker;

use Illuminate\Http\Resources\Json\JsonResource;

class MainAlkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kode_main_alker' => $this->kode_main_alker,
            'nama_barang' => $this->nama_barang,
            'satuan' => $this->satuan,
        ];
    }
=======
<?php

namespace App\Http\Resources\MainAlker;

use Illuminate\Http\Resources\Json\JsonResource;

class MainAlkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'kode_main_alker' => $this->kode_main_alker,
            'nama_barang' => $this->nama_barang,
            'satuan' => $this->satuan,
        ];
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
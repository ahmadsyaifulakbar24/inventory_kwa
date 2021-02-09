<<<<<<< HEAD
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KabKotaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provinsi' => new ProvinsiResource($this->provinsi),
            'kab_kota' => $this->kab_kota,
            'ibu_kota' => $this->ibu_kota,
        ];
    }
=======
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class KabKotaResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provinsi' => new ProvinsiResource($this->provinsi),
            'kab_kota' => $this->kab_kota,
            'ibu_kota' => $this->ibu_kota,
        ];
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
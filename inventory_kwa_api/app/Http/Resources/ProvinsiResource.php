<<<<<<< HEAD
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinsiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provinsi' => $this->provinsi
        ];
    }
=======
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvinsiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'provinsi' => $this->provinsi
        ];
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
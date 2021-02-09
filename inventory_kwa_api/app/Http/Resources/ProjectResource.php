<<<<<<< HEAD
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'project_name' => $this->project_name,
            'provinsi' => $this->provinsi,
            'kab_kota' => $this->kab_kota,
            'kecamatan' => $this->kecamatan,
            'project_items' => ProjectItemResource::collection($this->items),
        ];
    }
=======
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'project_name' => $this->project_name,
            'provinsi' => $this->provinsi,
            'kab_kota' => $this->kab_kota,
            'kecamatan' => $this->kecamatan,
            'project_items' => ProjectItemResource::collection($this->items),
        ];
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
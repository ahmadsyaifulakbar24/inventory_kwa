<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama_project' => $this->nama_project,
            'items' => ProjectItemResource::collection($this->project_items),
        ];
    }
}
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
            'project_items' => ProjectItemResource::collection($this->items),
        ];
    }
}
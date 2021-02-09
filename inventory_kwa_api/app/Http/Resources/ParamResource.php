<<<<<<< HEAD
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'param' => $this->param,
        ];
    }
=======
<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParamResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'param' => $this->param,
        ];
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
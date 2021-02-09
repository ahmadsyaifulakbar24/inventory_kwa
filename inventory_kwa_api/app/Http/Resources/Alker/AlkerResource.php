<<<<<<< HEAD
<?php

namespace App\Http\Resources\Alker;

use Illuminate\Http\Resources\Json\JsonResource;

class AlkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'main_alker' => new MainAlkerResource($this->main_alker),
            'kode_alker' => $this->kode_alker,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
            'front_picture' => !empty($this->front_pciture) ? url('images/alker/'.$this->front_pciture) : NULL,
            'back_picture' => !empty($this->back_pciture) ? url('images/alker/'.$this->back_pciture) : NULL,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
=======
<?php

namespace App\Http\Resources\Alker;

use Illuminate\Http\Resources\Json\JsonResource;

class AlkerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'main_alker' => new MainAlkerResource($this->main_alker),
            'kode_alker' => $this->kode_alker,
            'status' => $this->status,
            'keterangan' => $this->keterangan,
            'front_picture' => !empty($this->front_pciture) ? url('images/alker/'.$this->front_pciture) : NULL,
            'back_picture' => !empty($this->back_pciture) ? url('images/alker/'.$this->back_pciture) : NULL,
            'created_at' => \Carbon\Carbon::parse($this->created_at)->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ];
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
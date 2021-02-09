<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanRequestItem extends Model 
{
    protected $table = 'pengadaan_request_items';

    protected $fillable = [
        'pengadaan_request_id',
        'main_alker_id',
        'item_id',
        'total',
        'status',
    ];

    public $timestamps = false;

    public function pengadaan_request()
    {
        return $this->belongsTo(PengadaanRequest::class, 'pengadaan_request_id');
    }

    public function main_alker()
    {
        return $this->belongsTo(MainAlker::class, 'main_alker_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanRequestItem extends Model 
{
    protected $table = 'pengadaan_request_items';

    protected $fillable = [
        'pengadaan_request_id',
        'main_alker_id',
        'item_id',
        'total',
        'status',
    ];

    public $timestamps = false;

    public function pengadaan_request()
    {
        return $this->belongsTo(PengadaanRequest::class, 'pengadaan_request_id');
    }

    public function main_alker()
    {
        return $this->belongsTo(MainAlker::class, 'main_alker_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

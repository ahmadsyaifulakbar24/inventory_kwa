<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanRequest extends Model 
{
    protected $table = 'pengadaan_requests';

    protected $fillable = [
        'code',
        'jenis_pengadaan_id'
    ];

    public function pengadaan_request_item()
    {
        return $this->hasMany(PengadaanRequestItem::class, 'pengadaan_request_id');
    }

    public function jenis_pengadaan()
    {
        return $this->belongsTo(Param::class, 'jenis_pengadaan_id');
    }
}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanRequest extends Model 
{
    protected $table = 'pengadaan_requests';

    protected $fillable = [
        'code',
        'jenis_pengadaan_id'
    ];

    public function pengadaan_request_item()
    {
        return $this->hasMany(PengadaanRequestItem::class, 'pengadaan_request_id');
    }

    public function jenis_pengadaan()
    {
        return $this->belongsTo(Param::class, 'jenis_pengadaan_id');
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

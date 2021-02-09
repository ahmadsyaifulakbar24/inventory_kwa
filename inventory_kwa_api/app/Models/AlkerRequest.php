<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlkerRequest extends Model 
{
    protected $table = 'alker_request';

    protected $fillable = [
        'alker_id',
        'sto_id',
        'teknisi_id',
        'kegunaan',
        'keterangan_id',
        'front_picture',
        'back_picture',
        'status',
    ];
}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlkerRequest extends Model 
{
    protected $table = 'alker_request';

    protected $fillable = [
        'alker_id',
        'sto_id',
        'teknisi_id',
        'kegunaan',
        'keterangan_id',
        'front_picture',
        'back_picture',
        'status',
    ];
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

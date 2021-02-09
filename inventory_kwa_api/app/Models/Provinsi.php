<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model 
{
    protected $table = 'provinsi';

    protected $fillable = [
        'provinsi'
    ];

    public $timestamps = false;

    public function kab_kota()
    {
        return $this->hasMany('App/Models/KabKota', 'provinsi_id');
    }
}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model 
{
    protected $table = 'provinsi';

    protected $fillable = [
        'provinsi'
    ];

    public $timestamps = false;

    public function kab_kota()
    {
        return $this->hasMany('App/Models/KabKota', 'provinsi_id');
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

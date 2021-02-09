<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Param extends Model 
{
    protected $table = 'params';

    protected $fillable = [
        'category_param',
        'param',
        'order',
        'active'
    ];

    public $timestamps = false;
}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Param extends Model 
{
    protected $table = 'params';

    protected $fillable = [
        'category_param',
        'param',
        'order',
        'active'
    ];

    public $timestamps = false;
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

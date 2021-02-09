<<<<<<< HEAD
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanReviewItem extends Model 
{
    protected $table = 'pengadaan_review_items';

    protected $fillable = [
        'pengadaan_review_id',
        'pengadaan_request_item_id',
        'price'
    ];

    public $timestamps = false;

}
=======
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengadaanReviewItem extends Model 
{
    protected $table = 'pengadaan_review_items';

    protected $fillable = [
        'pengadaan_review_id',
        'pengadaan_request_item_id',
        'price'
    ];

    public $timestamps = false;

}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

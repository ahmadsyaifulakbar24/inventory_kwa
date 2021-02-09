<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\MainAlkerResource;
use App\Models\MainAlker;

class GetMainAlkerController extends Controller
{
    public function __invoke()
    {
        $main_alker = MainAlker::orderBY('id', 'DESC')->get();
        return MainAlkerResource::collection($main_alker);
    }
=======
<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\MainAlkerResource;
use App\Models\MainAlker;

class GetMainAlkerController extends Controller
{
    public function __invoke()
    {
        $main_alker = MainAlker::orderBY('id', 'DESC')->get();
        return MainAlkerResource::collection($main_alker);
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
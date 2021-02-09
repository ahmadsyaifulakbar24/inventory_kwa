<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Param;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParamResource;
use App\Models\Param;

class GetStoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $param = Param::where([['category_param', 'sto'], ['active', 1]])->orderBy('id')->get();
        return ParamResource::collection($param);
    }
}
=======
<?php

namespace App\Http\Controllers\Param;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParamResource;
use App\Models\Param;

class GetStoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $param = Param::where([['category_param', 'sto'], ['active', 1]])->orderBy('id')->get();
        return ParamResource::collection($param);
    }
}
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3

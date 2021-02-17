<?php

namespace App\Http\Controllers\Param;

use App\Http\Controllers\Controller;
use App\Http\Resources\ParamResource;
use App\Models\Param;

class GetTypeFilePengadaanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $param = Param::where([['category_param', 'type_file_pengadaan'], ['active', 1]])->orderBy('id')->get();
        return ParamResource::collection($param);
    }
}

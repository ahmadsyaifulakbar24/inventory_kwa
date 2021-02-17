<?php

namespace App\Http\Controllers\Provinsi;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinsiResource;
use App\Models\Provinsi;

class GetProvinsiController extends Controller
{
    public function __construct()
    {
        //
    }

    public function __invoke()
    {
        $provinsi = Provinsi::all();
        return  ProvinsiResource::collection($provinsi);
    }
}

<?php

namespace App\Http\Controllers\KabKota;

use App\Http\Controllers\Controller;
use App\Http\Resources\KabKotaResource;
use App\Models\KabKota;

class GetKabKotaController extends Controller
{
    public function __construct()
    {
        //
    }

    public function get_all()
    {
        $kab_kota = KabKota::all();
        return KabKotaResource::collection($kab_kota);
    }

    public function get_by_provinsi_id($provinsi_id)
    {
        $kab_kota = KabKota::where('provinsi_id', $provinsi_id)->get();
        return KabKotaResource::collection($kab_kota);
    }
}

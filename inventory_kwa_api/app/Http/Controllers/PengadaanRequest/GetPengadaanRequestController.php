<?php

namespace App\Http\Controllers\PengadaanRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengadaanRequest\PengadaanRequestResource;
use App\Models\PengadaanRequest;

class GetPengadaanRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $pengadaan_request = PengadaanRequest::orderBy('id', 'desc')->paginate(15);
        return PengadaanRequestResource::collection($pengadaan_request);
    }

    public function by_id($pengadaan_request_id)
    {
        $pengadaan_request = PengadaanRequest::find($pengadaan_request_id);
        return new PengadaanRequestResource($pengadaan_request);
    }
}

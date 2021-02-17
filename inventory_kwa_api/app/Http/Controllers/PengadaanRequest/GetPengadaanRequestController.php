<?php

namespace App\Http\Controllers\PengadaanRequest;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengadaanRequest\PengadaanRequestItemResource;
use App\Http\Resources\PengadaanRequest\PengadaanRequestResource;
use App\Models\PengadaanRequest;
use App\Models\PengadaanRequestItem;
use Illuminate\Http\Request;

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

    public function item_filter(Request $request) 
    {
        $this->validate($request, [
            'status' => ['required', 'in:approve,decline,pending,selected']
        ]);

        $pengadaan_request_item = PengadaanRequestItem::where('status', $request->status)->get();
        if($pengadaan_request_item) {
            return PengadaanRequestItemResource::collection($pengadaan_request_item);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}

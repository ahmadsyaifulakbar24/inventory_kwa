<?php

namespace App\Http\Controllers\PengadaanRequest;

use App\Http\Controllers\Controller;
use App\Models\PengadaanRequest;

class DeletePengadaanRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke($pengadaan_request_id)
    {
        $pengadaan_request = PengadaanRequest::find($pengadaan_request_id);
        if($pengadaan_request) {
            $cek_pengadaan_request_item = $pengadaan_request->pengadaan_request_item->where('status', 'approve')->count();
            if($cek_pengadaan_request_item  < 1) {
                $pengadaan_request->delete();
                return response()->json([
                    'message' => 'success',
                ], 200);
            } else {
                return response()->json([
                    'message' => 'data cannot be deleted'
                ], 401);
            }
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}

<?php

namespace App\Http\Controllers\PengadaanRequest;

use App\Http\Controllers\Controller;
use App\Models\PengadaanRequest;
use Illuminate\Http\Request;

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
            $pengadaan_request_item = $pengadaan_request->pengadaan_request_item->first();
            if($pengadaan_request_item->status != 'approve') {
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

<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\AlkerRequestGroupResource;
use App\Http\Resources\Alker\AlkerRequestResource;
use App\Models\AlkerRequest;
use Illuminate\Support\Facades\DB;

;

class GetAlkerRequestController extends Controller
{
    public function get_all()
    {
        $alker_request = AlkerRequest::orderBy('id', 'DESC')->paginate(10);
        return AlkerRequestResource::collection($alker_request);
    }

    public function get_by_id($alker_request_id) 
    {
        $alker_request = AlkerRequest::find($alker_request_id);
        if($alker_request) {
            return new AlkerRequestResource($alker_request);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }

    public function get_group()
    {
        $alker_request = AlkerRequest::select('alker_request.id', 'alker_id', 'alker.kode_alker', 'main_alker.nama_barang', DB::raw('count(*) as total'))->groupBy('alker_id')
                            ->leftJoin('alker', 'alker.id', '=', 'alker_request.alker_id')
                            ->leftJoin('main_alker', 'main_alker.id', '=', 'alker.main_alker_id')->paginate(10);
        return AlkerRequestGroupResource::collection($alker_request);
    }

    public function get_by_group($alker_id)
    {
        $alker_request = AlkerRequest::where('alker_id', $alker_id)->get();
        return AlkerRequestResource::collection($alker_request);
    }
}
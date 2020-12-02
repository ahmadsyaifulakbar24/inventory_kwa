<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\AlkerResource;
use App\Http\Resources\Alker\DetailAlkerResource;
use App\Models\Alker;
use App\Models\DetailAlker;
use Illuminate\Http\Request;

class GetAlkerController extends Controller
{
    public function get_all(Request $request)
    {
        $this->validate($request, [
            'status' => ['nullable', 'in:in,out'],
            'code_alker' => ['nullable', 'string']
        ]);
        if(!empty($request->status)) {
            if(!empty($request->code_alker)) {
                $alker = Alker::where([['status', $request->status], ['kode_alker', 'like', $request->code_alker.'%']])->get();
            } else {
                $alker = Alker::where('status', $request->status)->get();
            }
        } else {
            $alker = Alker::all();
        }
        return AlkerResource::collection($alker);
    }

    public function get_by_id($alker_id)
    {
        $alker = Alker::find($alker_id);
        if($alker) {
            return new DetailAlkerResource($alker);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
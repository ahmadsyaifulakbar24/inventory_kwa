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
            'code_alker' => ['nullable', 'string'],
            'main_alker_id' => ['nullable', 'string']
        ]);
        if(!empty($request->status)) {
            if(!empty($request->code_alker)) {
                $alker = Alker::where([['status', $request->status], ['kode_alker', 'like', $request->code_alker.'%']])->get();
            } else {
                $alker = Alker::where('status', $request->status)->get();
            }
        } else if($request->main_alker_id) {
            $alker = Alker::where('main_alker_id', $request->main_alker_id)->paginate(10);
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

    public function get_by_code_alker($code_alker)
    {
        $alker = Alker::where('kode_alker', $code_alker)->first();
        if($alker) {
            return new DetailAlkerResource($alker);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
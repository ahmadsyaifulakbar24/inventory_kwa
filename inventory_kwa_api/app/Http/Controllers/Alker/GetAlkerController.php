<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\AlkerResource;
use App\Http\Resources\Alker\DetailAlkerResource;
use App\Models\Alker;
use App\Models\DetailAlker;
use Illuminate\Http\Request;
use Ramsey\Uuid\Codec\GuidStringCodec;

class GetAlkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['get_by_code_alker']]);
    }
    
    public function get_all(Request $request)
    {
        $this->validate($request, [
            'status' => ['nullable', 'in:in,out'],
            'kode_alker' => ['nullable', 'string'],
            'main_alker_id' => ['nullable', 'string']
        ]);
        if(!empty($request->status)) {
            if(!empty($request->kode_alker)) {
                $alker = Alker::where([['status', $request->status], ['kode_alker', 'like', '%'.$request->kode_alker.'%']])->get();
            } else {
                $alker = Alker::where('status', $request->status)->orderBy('id', 'DESC')->get();
            }
        } else if($request->main_alker_id) {
            $alker = Alker::where('main_alker_id', $request->main_alker_id)->orderBy('id', 'DESC')->paginate(10);
        } else {
            $alker = Alker::orderBy('id', 'DESC')->get();
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

    public function get_by_code_alker(Request $request)
    {
        $this->validate($request, [
            'kode_alker' => ['required', 'exists:alker,kode_alker'],
        ]);
        $alker = Alker::where('kode_alker', $request->kode_alker)->first();
        if($alker) {
            return new DetailAlkerResource($alker);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }

    public function get_by_status(Request $request)
    {
        $this->validate($request, [
            'status' => ['required', 'in:in,out,pending']
        ]);
        $alker = Alker::where('status', $request->status)->paginate(10);
        return DetailAlkerResource::collection($alker);
    }
}
<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\AlkerResource;
use App\Http\Resources\Alker\DetailAlkerResource;
use App\Models\Alker;
use App\Models\DetailAlker;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateDetailAlkerController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'alker_id' => ['required', 'exists:alker,id'],
            'sto_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category_param', 'sto');
                })
            ],
            'teknisi_id' => ['required', 'exists:employees,id'],
            'kegunaan' => ['required', 'in:psb,migrasi,osp']
        ]);
        
        $detail_alker = DetailAlker::where('alker_id', $request->alker_id)->count();
        if($detail_alker < 1) {
            $alker = Alker::find($request->alker_id);
            $input = $request->all();
            $alker->detail_alker()->create($input);
            return new DetailAlkerResource($alker);
        } else {
            return response()->json([
                'message' => 'the data already exists'
            ], 422);
        }

    }
}
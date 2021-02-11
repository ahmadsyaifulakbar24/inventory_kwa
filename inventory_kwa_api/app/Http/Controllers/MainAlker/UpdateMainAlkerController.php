<?php

namespace App\Http\Controllers\MainAlker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\MainAlkerResource;
use App\Models\MainAlker;
use Illuminate\Http\Request;

class UpdateMainAlkerController extends Controller
{
    public function __invoke(Request $request, $main_alker_id)
    {
        $main_alker = MainAlker::find($main_alker_id);
        if($main_alker) {
            $this->validate($request, [
                'kode_main_alker' => ['required', 'unique:main_alker,kode_main_alker,'.$main_alker->id],
                'nama_barang' => ['required', 'string'],
                'satuan' => ['required', 'string']
            ]);
            
            $input = $request->all();
            $main_alker->update($input);
            return new MainAlkerResource($main_alker);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}

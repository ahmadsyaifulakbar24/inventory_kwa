<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class UpdateItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $id)
    {
        $item = Item::find($id);

        if($item) {

            $this->validate($request, [
                'kode' => ['required', 'string', 'unique:items,kode,'.$item->id],
                'nama_barang' => ['required', 'string'],
                'satuan' => ['required', 'string', 'exists:params,param'],
                'keterangan' => ['required', 'string'],
                'jenis' => ['required', 'string', 'exists:params,param'],
                'stock' => ['required', 'numeric', 'min:0'],
            ]);
            $input = $request->all();
            $item->update($input);
            return  new ItemResource($item);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

    }
}

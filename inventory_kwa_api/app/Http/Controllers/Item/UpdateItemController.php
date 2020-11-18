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
            if($request->type_item == 'goods') {
                $keterangan = ['required', 'string'];
                $jenis = ['required', 'string', 'exists:params,param'];
                $stock = ['required', 'numeric', 'min:0'];
            } else {
                $keterangan = ['nullable', 'string'];
                $jenis = ['nullable', 'string', 'exists:params,param'];
                $stock = ['nullable', 'numeric', 'min:0'];
            }
            $this->validate($request, [
                'kode' => ['required', 'string', 'unique:items,kode,'.$item->id],
                'nama_barang' => ['required', 'string'],
                'satuan' => ['required', 'string', 'exists:params,param'],
                'keteranan' => $keterangan,
                'jenis' => $jenis,
                'stock' => $stock,
            ]);

            if($request->type_item == 'goods') {
                $input = $request->all();
            } else {
                $input['kode'] = $request->kode;
                $input['nama_barang'] = $request->nama_barang;
                $input['satuan'] = $request->satuan;
            }
            $item->update($input);
            return  new ItemResource($item);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

    }
}

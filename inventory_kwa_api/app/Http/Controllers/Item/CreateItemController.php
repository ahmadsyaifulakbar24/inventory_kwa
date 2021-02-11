<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class CreateItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'kode' => ['required', 'string', 'unique:items,kode'],
            'nama_barang' => ['required', 'string'],
            'keterangan' => ['required', 'string'],
            'satuan' => ['required', 'string', 'exists:params,param'],
            'jenis' => ['required', 'string', 'exists:params,param'],
            'stock' => ['required', 'numeric', 'min:0']
        ]);

        $input = $request->all();

        $item = Item::create($input);
        return new ItemResource($item);
    }
}

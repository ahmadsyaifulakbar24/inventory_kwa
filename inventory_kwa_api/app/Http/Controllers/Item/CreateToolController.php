<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class CreateToolController extends Controller
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
            'satuan' => ['required', 'string', 'exists:params,param']
        ]);

        $input = $request->all();
        $input['type_item'] = 'tool';

        $item = Item::create($input);
        return new ItemResource($item);
    }
}

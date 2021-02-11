<?php

namespace App\Http\Controllers\MainAlker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\MainAlkerResource;
use App\Models\MainAlker;
use Illuminate\Http\Request;

class CreateMainAlkerController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'kode_main_alker' => ['required', 'unique:main_alker,kode_main_alker'],
            'nama_barang' => ['required', 'string'],
            'satuan' => ['required', 'string']
        ]);

        $input = $request->all();
        $main_alker = MainAlker::create($input);
        return new MainAlkerResource($main_alker);
    }
}

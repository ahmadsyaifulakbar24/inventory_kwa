<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Resources\Alker\AlkerResource;
use App\Models\Alker;
use App\Models\MainAlker;
use Illuminate\Http\Request;

class CreateAlkerController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'main_alker_id' => ['required', 'exists:main_alker,id'],
        ]);
        $input = $request->all();
        $main_alker_id = $request->main_alker_id;
        $main_alker = MainAlker::find($main_alker_id);
        $cek_alker = Alker::where('main_alker_id', $main_alker_id)->count();
        if($cek_alker > 0) {
            $last_alker = Alker::where('main_alker_id', $main_alker_id)->orderBy('id', 'DESC')->first();
            $kode = explode("/",$last_alker->kode_alker);
            $input['kode_alker'] = $kode[0]+1 .'/'.$main_alker->kode_main_alker;
        } else {
            $input['kode_alker'] = "1/".$main_alker->kode_main_alker;
        }
        $data = Alker::create($input);
        return new AlkerResource($data);
    }
}
<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
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
            'keterangan' => ['nullable', 'string']
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
        $input['status'] = 'in';
        $data = Alker::create($input);
        $history['alker_id'] = $data->id;
        $history['status'] = 'create_goods';
        HistoryController::createHistory($history);
        return new AlkerResource($data);
    }
=======
<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
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
            'keterangan' => ['nullable', 'string']
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
        $input['status'] = 'in';
        $data = Alker::create($input);
        $history['alker_id'] = $data->id;
        $history['status'] = 'create_goods';
        HistoryController::createHistory($history);
        return new AlkerResource($data);
    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
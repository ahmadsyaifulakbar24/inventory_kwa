<<<<<<< HEAD
<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
use App\Http\Resources\Alker\AlkerResource;
use App\Models\Alker;
use Illuminate\Http\Request;

class UpdateAlkerController extends Controller
{
    public function __invoke(Request $request, $alker_id)
    {
        $this->validate($request, [
            'keterangan' => ['nullable', 'string']
        ]);
        $alker = Alker::find($alker_id);
        if($alker) {
            $input = $request->all();
            $alker->update($input);
            $history['alker_id'] = $alker->id;
            $history['status'] = 'update_goods';
            HistoryController::createHistory($history);
            return new AlkerResource($alker);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

    }
=======
<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
use App\Http\Resources\Alker\AlkerResource;
use App\Models\Alker;
use Illuminate\Http\Request;

class UpdateAlkerController extends Controller
{
    public function __invoke(Request $request, $alker_id)
    {
        $this->validate($request, [
            'keterangan' => ['nullable', 'string']
        ]);
        $alker = Alker::find($alker_id);
        if($alker) {
            $input = $request->all();
            $alker->update($input);
            $history['alker_id'] = $alker->id;
            $history['status'] = 'update_goods';
            HistoryController::createHistory($history);
            return new AlkerResource($alker);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }

    }
>>>>>>> 96b967099916ef531958609f80f4e4e1769e14e3
}
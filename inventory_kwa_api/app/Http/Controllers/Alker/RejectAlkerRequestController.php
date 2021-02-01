<?php

namespace App\Http\Controllers\Alker;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
use App\Models\Alker;
use App\Models\AlkerRequest;
use Illuminate\Http\Request;

class RejectAlkerRequestController extends Controller
{
    public function __invoke(Request $request, $alker_request_id)
    {
        $alker_request = AlkerRequest::find($alker_request_id);
        if($alker_request) {
            $alker_request->update(['status' => 'rejected']);
            $alker = Alker::find($alker_request->alker_id);
            $alker->update([ 'status' => 'in' ]);

            $history['status'] = 'reject_goods';
            $history['alker_id'] = $alker->id;
            $history['alker_request_id'] = $alker_request->id;
            HistoryController::createHistory($history);
            return response()->json([
                'message' => 'success'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Alker Request not found'
            ], 404);
        }
    }
}
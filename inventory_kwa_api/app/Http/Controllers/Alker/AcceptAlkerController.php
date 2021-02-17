<?php

namespace App\Http\Controllers\Alker;

use App\Helpers\FileHelpers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
use App\Models\Alker;
use App\Models\AlkerRequest;
use Illuminate\Http\Request;

class AcceptAlkerController extends Controller
{
    public function __invoke(Request $request, $alker_request_id)
    {
        $alker_request = AlkerRequest::find($alker_request_id);
        if($alker_request) {
            $alker = Alker::find($alker_request->alker_id);
            if($alker_request->keterangan_id == 28) {
               $input['status'] = 'accepted';
               $update_alker['status'] = 'in';
               $update_alker['front_picture'] = $alker_request->front_picture;
               $update_alker['back_picture'] = $alker_request->back_picture;
               $alker->detail_alker()->delete();
               $history['status'] = 'incoming_goods';
            } else {
                $this->validate($request, [
                    'front_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
                    'back_picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg']
                ]);

                $path = 'images/alker/';
                $name_front_picture = FileHelpers::uploadFile($path, $request->front_picture);
                $name_back_picture = FileHelpers::uploadFile($path, $request->back_picture);
                $input['front_picture'] = $name_front_picture;
                $input['back_picture'] = $name_back_picture;
                $input['status'] = 'accepted';

                $input_alker['sto_id'] = $alker_request->sto_id;
                $input_alker['teknisi_id'] = $alker_request->teknisi_id;
                $input_alker['kegunaan'] = $alker_request->kegunaan;
                $alker->detail_alker()->create($input_alker);
                $update_alker['status'] = 'out';
                $update_alker['front_picture'] = $name_front_picture;
                $update_alker['back_picture'] = $name_back_picture;
                $history['status'] = 'exit_goods';
            }
            $alker->update($update_alker);
            $alker_request->update($input);
            $history['alker_id'] = $alker->id;
            $history['alker_request_id'] = $alker_request->id;
            HistoryController::createHistory($history);
            return response()->json([
                'message' => 'request alker accepted'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Alker Request not found'
            ], 404);
        }
    }
}
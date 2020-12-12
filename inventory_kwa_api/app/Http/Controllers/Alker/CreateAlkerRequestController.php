<?php

namespace App\Http\Controllers\Alker;

use App\Helpers\FileHelpers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HistoryController;
use App\Models\Alker;
use App\Models\AlkerRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateAlkerRequestController extends Controller
{
    public function __invoke(Request $request)
    {
        $keterangan_id = $request->keterangan_id;
        if($keterangan_id == 28) {
            $alker_id = [
                'required',
                Rule::exists('alker', 'id')->where(function($query) {
                    $query->where('status', 'out');
                })
            ];
            $front_picture = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $back_picture = ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        } else {
            $alker_id = [
                'required', 
                Rule::exists('alker', 'id')->where(function($query) {
                    $query->where('status', 'in');
                })
            ];
            $front_picture = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
            $back_picture = ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'];
        }
        $this->validate($request, [
            'alker_id' => $alker_id,
            'sto_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category_param', 'sto');
                })
            ],
            'teknisi_id' => ['required', 'exists:employees,id'],
            'kegunaan' => ['required', 'in:psb,migrasi,osp'],
            'keterangan_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category_param', 'keterangan_alker');
                })
            ],
            'front_picture' => $front_picture,
            'back_picture' => $back_picture
        ]);
        
        if($keterangan_id == 28) {
            $path = 'images/alker/';
            $name_front_picture = FileHelpers::uploadFile($path, $request->front_picture);
            $name_back_picture = FileHelpers::uploadFile($path, $request->back_picture);
            $input['front_picture'] = $name_front_picture;
            $input['back_picture'] = $name_back_picture;
            $history['status'] = 'not_good_goods';
        } else {
            $input['sto_id'] = $request->sto_id;
            $input['teknisi_id'] = $request->teknisi_id;
            $input['kegunaan'] = $request->kegunaan;
            $history['status'] = 'request_goods';
        }
        $input['keterangan_id'] = $request->keterangan_id;
        $input['alker_id'] = $request->alker_id;
        $input['status'] = 'pending';
        $alker = Alker::find($request->alker_id);
        $alker->update([ 'status' => 'pending' ]);
        $alkerRequest = AlkerRequest::create($input);
        $history['alker_id'] = $alker->id;
        $history['alker_request_is'] = $alkerRequest->id;
        HistoryController::createHistory($history);
        return $alkerRequest;
    }
}
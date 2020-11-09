<?php

namespace App\Http\Controllers\ToolRequest;

use App\Models\ToolRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ToolRequestResource;

class AcceptToolRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $id)
    {
        $tool_request = ToolRequest::find($id);
        if ($tool_request) {
            if ($tool_request->keterangan_id == 32) {
                $this->validate($request, [
                    'front_picture'  => ['required', 'image', 'mimes:jpeg,bmp,png,jpg'],
                    'back_picture' => ['required', 'image', 'mimes:jpeg,bmp,png,jpg'],
                ]);

                if ($request->hasFile('front_picture')) {
                    $front_picture =  $request->file('front_picture');
                    $front_picture_name = $this->uploadFile('images/tools', $front_picture);
                    $input['front_picture'] = $front_picture_name;
                }

                if ($request->hasFile('back_picture')) {
                    $back_picture =  $request->file('back_picture');
                    $back_picture_name = $this->uploadFile('images/tools', $back_picture);
                    $input['back_picture'] = $back_picture_name;
                }
                $input['status'] = 'accepted';
                $tool_request->update($input);
                return "berhasil pake foto";
            } else {
                $tool_request->update([
                    'status' => 'accepted'
                ]);
            }
            return new ToolRequestResource($tool_request);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }

    public function uploadFile($path, $requestFile)
    {
        $image = $requestFile;
        $ext = $image->getClientOriginalExtension();
        if ($requestFile->isValid()) {
            $file_name = Str::random(20) . ".$ext";
            $upload_path = $path;
            $requestFile->move($upload_path, $file_name);
            return $file_name;
        }
    }
}

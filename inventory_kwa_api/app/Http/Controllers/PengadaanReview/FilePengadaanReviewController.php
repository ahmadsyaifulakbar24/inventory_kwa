<?php

namespace App\Http\Controllers\PengadaanReview;

use App\Helpers\FileHelpers;
use App\Http\Controllers\Controller;
use App\Http\Resources\PengadaanReview\PengadaanReviewResource;
use App\Models\PengadaanReview;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FilePengadaanReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request, $pengadaan_review_id)
    {
        $this->validate($request, [
            'type_file_id' => [
                'required',
                Rule::exists('params','id')->where(function ($query) {
                    return $query->where('category_param', 'type_file_pengadaan');
                })
            ],
            'file' => ['required', 'image','mimes:jpeg,png,jpg,gif,svg','max:2048']
        ]);
        $pengadaan_review = PengadaanReview::find($pengadaan_review_id);
        if($pengadaan_review) {
            $inputFile['file'] = FileHelpers::uploadFile('images/pembelian/', $request->file);
            $inputFile['type_file_id'] = $request->type_file_id;
            $pengadaan_review->pengadaan_review_file()->create($inputFile);
            return new PengadaanReviewResource($pengadaan_review);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
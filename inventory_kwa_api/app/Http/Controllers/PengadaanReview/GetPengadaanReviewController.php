<?php

namespace App\Http\Controllers\PengadaanReview;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengadaanReview\PengadaanReviewResource;
use App\Models\PengadaanReview;
use Illuminate\Http\Request;

class GetPengadaanReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all(Request $request)
    {
        
        $pengadaan_review = PengadaanReview::orderBy('id', 'desc')->paginate(15);
        return PengadaanReviewResource::collection($pengadaan_review);
    }

    public function by_id($pengadaan_review_id)
    {
        $pengadaan_review = PengadaanReview::find($pengadaan_review_id);
        if($pengadaan_review) {
            return new PengadaanReviewResource($pengadaan_review);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
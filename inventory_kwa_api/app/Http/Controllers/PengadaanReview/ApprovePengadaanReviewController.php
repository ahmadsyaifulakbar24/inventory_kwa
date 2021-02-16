<?php

namespace App\Http\Controllers\PengadaanReview;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengadaanReview\PengadaanReviewResource;
use App\Models\PengadaanRequestItem;
use App\Models\PengadaanReview;
use Illuminate\Http\Request;

class ApprovePengadaanReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function approve(Request $request, $pengadaan_review_id)
    {
        $user_level_id = $request->user()->user_level_id;
        $pengadaan_review = PengadaanReview::find($pengadaan_review_id);
        if($pengadaan_review) {
            if ($user_level_id == 103) {  
                $approve_name = 'first_approved_at';
            } else {
                $approve_name = 'second_approved_at';
            }
            $approve[$approve_name] = \Carbon\Carbon::now();
            $pengadaan_review->update($approve);
            return new PengadaanReviewResource($pengadaan_review);
        } else {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        }
    }
}
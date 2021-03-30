<?php

namespace App\Http\Controllers\PengadaanReview;

use App\Http\Controllers\Controller;
use App\Http\Resources\PengadaanReview\PengadaanReviewResource;
use App\Models\PengadaanRequestItem;
use App\Models\PengadaanReview;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreatePengadaanReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'url' => [
                'url',
                Rule::requiredIf(function () use ($request) {
                    $supplier = Supplier::find($request->supplier_id);
                    return $supplier->type == 'online';
                })
            ],
            'pengadaan_review_items' => ['required', 'array'],
            'pengadaan_review_items.*.pengadaan_request_item_id' => ['required', 'exists:pengadaan_request_items,id'],
            'pengadaan_review_items.*.price' => ['required', 'numeric']
        ]);

        // Insert Pengadaan Review 
        $last_code = PengadaanReview::latest()->first();
        $inputReview['code'] = $last_code['code'] + 1; 
        $inputReview['supplier_id'] = $request->supplier_id; 
        $inputReview['url'] = !empty($request->url) ? $request->url : NULL;
        $inputReview['status'] = 'processed';
        $pengadaan_review = PengadaanReview::create($inputReview);

        // Insert Pengadaan Review Items
        $pengadaan_review_items = $request->pengadaan_review_items;
        $pengadaan_review->pengadaan_review_item()->createMany($pengadaan_review_items);

        foreach($pengadaan_review_items as $review_item) {
            $request_item_id = $review_item['pengadaan_request_item_id'];
            $pengadaan_request_item = PengadaanRequestItem::find($request_item_id);
            $pengadaan_request_item->update([ 'status' => 'selected' ]);
        }
        
        return new PengadaanReviewResource($pengadaan_review);
    }
}
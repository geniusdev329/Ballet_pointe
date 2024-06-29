<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product_reviews = ProductReview::with('product', 'user')->orderBy('id', 'desc')->get();
        return view('admin.product-reviews.index', compact('product_reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_review = ProductReview::find($id);
        return view('admin.product-reviews.edit', compact('product_review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'user_nickname' => 'required',
                'content' => 'required',
                'purchase_size' => 'required',
                'purchase_width' => 'required',
                'shank' => 'required',
                'average_satisfaction' => 'required',
                'comfort' => 'required',
                'quietness' => 'required',
                'lightness' => 'required',
                'stability' => 'required',
                'longavity' => 'required',
            ],
            [
                'user_nickname.required' => 'ユーザー名を入力して下さい。',
                'content.required' => '内容を入力してください。',
                'purchase_size.required' => '購入サイズを入力してください。',
                'purchase_width.required' => '購入幅を入力してください。',
                'shank.required' => 'シャンクを入力してください。',
                'average_satisfaction.required' => '平均満足度を入力してください' ,
                'comfort.required' => '履き心地を入力してください。',
                'quietness.required' => '静けさを入力してください。',
                'lightness.required' => '明るさを入力してください。',
                'stability.required' => '安定性を入力してください。',
                'longavity.required' => '耐久性を入力してください。',
            ]
        );

        $product_review = ProductReview::find($id);
        $product_review->user_id = $request->get('user_id');
        $product_review->product_id = $request->get('product_id');
        $product_review->content = $request->get('content');
        $product_review->purchase_size = $request->get('purchase_size');
        $product_review->purchase_width = $request->get('purchase_width');
        $product_review->shank = $request->get('shank');
        $product_review->average_satisfaction = $request->get('average_satisfaction');
        $product_review->comfort = $request->get('comfort');
        $product_review->quietness = $request->get('quietness');
        $product_review->lightness = $request->get('lightness');
        $product_review->stability = $request->get('stability');
        $product_review->longavity = $request->get('longavity');
        $product_review->status = ($request->get('status') == 'on') ? 1 : 0;

        
        $product_review->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.product-reviews.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product_review = ProductReview::find($id);

        // Check if the model exists
        if ($product_review) {
            // Delete the model
            $product_review->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.product-reviews.index')->with($alert);
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Maker;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $makers = Maker::orderBy('type')->get()
            ->groupBy('type')
            ->map(function ($group) {
                return $group->pluck('name', 'id');
            });

        return view('admin.products.create', compact('makers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'maker_id' => 'required',
                'rakuten_link' => 'nullable|url',
                'amazon_link' => 'nullable|url',
                'yahoo_link' => 'nullable|url',
                'status' => 'required',
            ],
            [
                'name.required' => '商品名を入力してください。',
                'description.required' => '商品説明を入力してください。',
                'maker_id.required' => 'メーカーを選択してください',
                'rakuten_link.url' => '有効なURLを入力してください。',
                'amazon_link.url' => '有効なURLを入力してください。',
                'yahoo_link.url' => '有効なURLを入力してください。',
                'status.required' => 'ステータスをお選びください。',
            ]
        );

        $product = new Product();
        $product->name = $request->get('name');
        $product->html_description = $request->get('description');
        $product->description = strip_tags($request->get('description'));
        $product->maker_id = $request->get('maker_id');
        $product->rakuten_link = $request->get('rakuten_link');
        $product->amazon_link = $request->get('amazon_link');
        $product->yahoo_link = $request->get('yahoo_link');
        $product->status = (int)$request->get('status');
        if ($request->hasFile('product_img')) {
            $imageName = time() . '.' . $request->file('product_img')->extension();
            $request->file('product_img')->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }
        $product->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.products.index')->with($alert);
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
        $product = Product::find($id);
        $makers = Maker::orderBy('type')->get()
            ->groupBy('type')
            ->map(function ($group) {
                return $group->pluck('name', 'id');
            });
        return view('admin.products.edit', compact('product', 'makers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'maker_id' => 'required',
                'rakuten_link' => ['nullable','url'],
                'amazon_link' => 'nullable|url',
                'yahoo_link' => 'nullable|url',
                'status' => 'required',
            ],
            [
                'name.required' => '商品名を入力してください。',
                'description.required' => '商品説明を入力してください。',
                'maker_id.required' => 'メーカーを選択してください',
                'rakuten_link.url' => '有効なURLを入力してください。',
                'amazon_link.url' => '有効なURLを入力してください。',
                'yahoo_link.url' => '有効なURLを入力してください。',
                'status.required' => 'ステータスをお選びください。',
            ]
        );

        $product = Product::find($id);
        $product->name = $request->get('name');
        $product->html_description = $request->get('description');
        $product->description = strip_tags($request->get('description'));
        $product->maker_id = $request->get('maker_id');
        $product->rakuten_link = $request->get('rakuten_link');
        $product->amazon_link = $request->get('amazon_link');
        $product->yahoo_link = $request->get('yahoo_link');
        $product->status = (int)$request->get('status');
        if ($request->hasFile('product_img')) {
            $imageName = time() . '.' . $request->file('product_img')->extension();
            $request->file('product_img')->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
        }
        $product->save();

        $alert = array(
            'message' => 'データが正常に保存されました!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.products.index')->with($alert);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        // Check if the model exists
        if ($product) {
            // Delete the model
            $product->delete();
            $alert = array(
                'message' => 'データが正常に削除されました!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.products.index')->with($alert);
        }
    }
}

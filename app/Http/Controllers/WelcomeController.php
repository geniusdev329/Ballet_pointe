<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Maker;
use App\Models\Notification;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Tou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $notifications = Notification::where('status', 1)->latest()->take(6)->get();
        $makers = Maker::orderBy('type')->get()
        ->groupBy('type')
        ->map(function ($group) {
            return $group->pluck('name', 'id');
        });
        return view('frontend.welcome', compact('blogs', 'notifications', 'makers'));
    }

    public function aboutMe()
    {
        return view('frontend.aboutme');
    }

    public function tos()
    {
        $tou = Tou::where('status', 1)->first();
        return view('frontend.tos', compact('tou'));
    }

    public function productDetail($id)
    {
        $product = Product::where(['id'=> $id, 'status' => 1])->first();
        return view('frontend.products.detail', compact('product'));
    }

    public function addReview(Request $request)
    {
        $product_id = $request->input('product_id');
        $purchase_size = $request->input('purchase_size');
        $purchase_width = $request->input('purchase_width');
        $shank = $request->input('shank');
        $average_satisfaction = $request->input('average_satisfaction');
        $comfort = $request->input('comfort');
        $quietness = $request->input('quietness');
        $lightness = $request->input('lightness');
        $stability = $request->input('stability');
        $longevity = $request->input('longevity');
        $review_text = $request->input('review_text');

        $product_check = Product::where(['id' => $product_id, 'status' => 1])->first();
        if($product_check) {
            $existing_review = ProductReview::where(['user_id' => Auth::user()->id, 'product_id' => $product_id])->first();
            if($existing_review) {
                $existing_review->purchase_size = $purchase_size;
                $existing_review->purchase_width = $purchase_width;
                $existing_review->shank = $shank;
                $existing_review->average_satisfaction = $average_satisfaction;
                $existing_review->comfort = $comfort;
                $existing_review->quietness = $quietness;
                $existing_review->lightness = $lightness;
                $existing_review->stability = $stability;
                $existing_review->longevity = $longevity;
                $existing_review->content = $review_text;
                $existing_review->update();
            }
            else {
                ProductReview::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product_id,
                    'purchase_size' => $purchase_size,
                    'purchase_width' => $purchase_width,
                    'shank' => $shank,
                    'average_satisfaction' => $average_satisfaction,
                    'comfort' => $comfort,
                    'quietness' => $quietness,
                    'lightness' => $lightness,
                    'stability' => $stability,
                    'longevity' => $longevity,
                    'content' => $review_text,
                ]);
            }
            return redirect()->back()->with('status', 'Thank you for rating this product');
        } 
        else {
            return redirect()->back()->with('status', 'The link you followed was broken');
        }
    }

    public function searchByMaker(Request $request)
    {
        $request->validate(
            [
                'makers' => 'required|array|min:1',
                'makers.*' => 'integer|min:1|exists:makers,id',
            ],
            [
                'makers.required' => '少なくとも1人のメーカーを選ばなければならない。',
                'makers.array' => 'メーカーは配列形式で指定してください。',
                'makers.min' => '少なくとも1人のメーカーを選ばなければならない。',
                'makers.*.integer' => 'メーカーIDは整数でなければなりません。',
                'makers.*.min' => 'メーカーIDは1以上でなければなりません。',
                'makers.*.exists' => '選択されたメーカーIDが存在しません。',
            ]
        );

        $selectedMakers = $request->input('makers');
        $products = Product::whereIn('maker_id', $selectedMakers)->get();

        return view('frontend.products.search-by-maker', ['products' => $products]);
    }

    public function searchByFeatures(Request $request)
    {
        $filters = [
            'foot_shape' => $request->input('foot_shape', []),
            'foot_width' => $request->input('foot_width', []),
            'foot_height' => $request->input('foot_height', []),
            'ballet_level' => $request->input('ballet_level', []),
        ];
        
        $product_reviews = ProductReview::whereHas('user', function ($query) use ($filters) {
            foreach ($filters as $field => $values) {
                if (!empty($values)) {
                    $query->whereIn($field, $values);
                }
            }
        })->get();
        return view('frontend.products.product-reviews', ['product_reviews' => $product_reviews]);
    }

    public function privacy()
    {
        $privacy_policy = PrivacyPolicy::where('status', 1)->first();
        return view('frontend.privacy', compact('privacy_policy'));
    }

    public function faq()
    {
        $all_faq = Faq::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('frontend.faq', compact('all_faq'));
        return view('frontend.faq');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function infor_setting()
    {
        return view('frontend.infor_setting');
    }

    public function my_infor()
    {
        return view('frontend.my_infor');
    }

    public function blogIndex()
    {
        $blogs = Blog::where('status', 1)->orderBy('created_at', 'desc')->get();
        return view('frontend.blogs.index', compact('blogs'));
    }

    public function blogDetail($id)
    {
        $blog = Blog::where(['id' => $id, 'status' => 1])->first();
        return view('frontend.blogs.detail', compact('blog'));
    }

    public function log_in()
    {
        return view('frontend.log_in');
    }
}

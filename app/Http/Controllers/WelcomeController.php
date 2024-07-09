<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\FavoriteProduct;
use App\Models\Guideline;
use App\Models\Maker;
use App\Models\Notification;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Tou;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)->latest()->take(5)->get();
        $notifications = Notification::where('status', 1)->latest()->take(6)->get();
        $makers = Maker::orderBy('type')->get()
        ->groupBy('type')
        ->map(function ($group) {
            return $group->pluck('name', 'id');
        });

        $product_reviews = ProductReview::where('status', 1)->latest()->take(4)->get();
        return view('frontend.welcome', compact('blogs', 'notifications', 'makers', 'product_reviews'));
    }

    public function detailNotification($id)
    {
        $notification = Notification::where(['id' => $id, 'status' => 1])->orderBy('id', 'desc')->first();
        return view('frontend.notifications.detail', compact('notification'));
    }

    public function notificationList()
    {
        $notifications = Notification::where('status', 1)->orderBy('id', 'desc')->get();
        return view('frontend.notifications.list', compact('notifications'));
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

    public function guideline()
    {
        $guideline = Guideline::where('status', 1)->first();
        return view('frontend.guideline', compact('guideline'));
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
        $longavity = $request->input('longavity');
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
                $existing_review->longavity = $longavity;
                $existing_review->content = $review_text;
                $existing_review->update();
                $alert = array(
                    'message' => '投稿された口コミがあります!',
                    'alert-type' => 'warning'
                );
                return redirect()->back()->with($alert);
            }
            else {
                $product_review = ProductReview::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product_id,
                    'purchase_size' => $purchase_size,
                    'purchase_width' => $purchase_width,
                    'shank' => $request->input('shank'),
                    'average_satisfaction' => $average_satisfaction,
                    'comfort' => $comfort,
                    'quietness' => $quietness,
                    'lightness' => $lightness,
                    'stability' => $stability,
                    'longavity' => $longavity,
                    'content' => $review_text,
                    'status' => 1,
                ]);


                if($product_review->status == 1) {
                    $attributes = [
                        'average_satisfaction',
                        'comfort',
                        'quietness',
                        'lightness',
                        'stability',
                        'longavity'
                    ];
            
                    // Get all products that have reviews
                    $productsWithReviews = ProductReview::where(['product_id' => $product_review->product_id, 'status' => 1])
                        ->distinct()
                        ->get();
        
                    $averages = [];
                    
        
                    foreach ($attributes as $attribute) {
                        $average = $productsWithReviews->avg($attribute);
                        
                        $averages[$attribute] = round($average, 2);
                    }
        
                    Product::where(['id' => $product_review->product_id, 'status' => 1])->update($averages);
                }
        
                $alert = array(
                    'message' => 'データが正常に保存されました!',
                    'alert-type' => 'success'
                );
                
            }
            return redirect()->back()->with('status', 'Thank you for rating this product');
        } 
        else {
            return redirect()->back()->with('status', 'The link you followed was broken');
        }
    }

    public function addFavorites(Request $request)
    {
        $product_id = $request->get('product_id');
        $check_favorite = FavoriteProduct::where(['user_id' => Auth::user()->id, 'product_id' => $product_id])->first();
        if(isset($check_favorite)) {
            $check_favorite->delete();
            return response()->json([
                'success' => true,
                'message' => 'お気に入り削除しました。'
            ]);
        }
        else {
            $favorite_product = new FavoriteProduct();
            $favorite_product->user_id = Auth::user()->id;
            $favorite_product->product_id = $product_id;
            $favorite_product->save();
            return response()->json([
                'success' => true,
                'message' => 'お気に入りに追加しました。'
            ]);
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
                'makers.required' => '最低一つ以上の条件を選択してください。',
                'makers.array' => 'メーカーは配列形式で指定してください。',
                'makers.min' => '最低一つ以上の条件を選択してください。',
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
        })
        ->where('status', 1)
        ->get();
        return view('frontend.products.product-reviews', ['product_reviews' => $product_reviews]);
    }

    public function searchByName(Request $request)
    {
        $product_name = $request->get('product_name');
        
        $products = Product::where('name', 'LIKE', '%' . $product_name . '%')->get();
        return view('frontend.products.search-by-name', ['products' => $products]);
    }

    public function privacy()
    {
        $privacy_policy = PrivacyPolicy::where('status', 1)->first();
        return view('frontend.privacy', compact('privacy_policy'));
    }

    public function faq()
    {
        $all_faq = Faq::where('status', 1)->orderBy('position_th', 'desc')->get();
        return view('frontend.faq', compact('all_faq'));
        return view('frontend.faq');
    }

    public function contact()
    {
        return view('frontend.contact');
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

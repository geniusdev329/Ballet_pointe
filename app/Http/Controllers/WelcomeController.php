<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Notification;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\Tou;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $notifications = Notification::where('status', 1)->latest()->take(6)->get();
        return view('frontend.welcome', compact('blogs', 'notifications'));
    }

    public function aboutMe()
    {
        return view('frontend.aboutme');
    }

    public function tos()
    {
        $tou = Tou::first();
        return view('frontend.tos', compact('tou'));
    }

    public function searchByMaker(Request $request)
    {
        $request->validate([
            'makers' => 'required|array|min:1',
            // 'makers.*' => 'integer|min:1|exists:makers,id',
        ]);
     

        $selectedMakers = $request->input('makers');
        $products = Product::whereIn('maker', $selectedMakers)->get();

        return view('frontend.products.search-by-maker', ['products' => $products]);
    }

    public function privacy()
    {
        $privacy_policy = PrivacyPolicy::first();
        return view('frontend.privacy', compact('privacy_policy'));
    }

    public function faq()
    {
        $all_faq = Faq::all();
        return view('frontend.faq', compact('all_faq'));
        return view('frontend.faq');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function balletpointe()
    {
        return view('frontend.balletpointe');
    }
    public function balletpointe_des($id)
    {
        return view('frontend.balletpointe_des');
    }

    public function search_1()
    {
        return view('frontend.search_1');
    }

    public function search_2()
    {
        return view('frontend.search_2');
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
        $blogs = Blog::all();
        return view('frontend.blogs.index', compact('blogs'));
    }

    public function blogDetail($id)
    {
        $blog = Blog::find($id);
        return view('frontend.blogs.detail', compact('blog'));
    }

    public function log_in()
    {
        return view('frontend.log_in');
    }
}

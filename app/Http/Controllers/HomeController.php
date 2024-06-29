<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Maker;
use App\Models\Notification;
use App\Models\ProductReview;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $blogs = Blog::where('status', 1)->latest()->take(3)->get();
        $notifications = Notification::where('status', 1)->latest()->take(6)->get();
        $makers = Maker::orderBy('type')->get()
        ->groupBy('type')
        ->map(function ($group) {
            return $group->pluck('name', 'id');
        });

        $product_reviews = ProductReview::where('status', 1)->latest()->take(4)->get();
        return view('frontend.welcome', compact('blogs', 'notifications', 'makers', 'product_reviews'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('admin.home');
    }
}

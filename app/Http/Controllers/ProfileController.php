<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = Auth::user();
        return view('frontend.profile.edit')->with('user', $user);
    }

    /**
     * Display the user's review form .
     */
    public function review(Request $request): View
    {
        $product_reviews = ProductReview::where(['user_id' => Auth::user()->id, 'status' => 1])->orderBy('id', 'desc')->get();
        return view('frontend.profile.edit-review', [
            'user' => $request->user(),
            'product_reviews' => $product_reviews,
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function favorite(Request $request): View
    {
        $user = Auth::user();
        $favorite_products = $user->favoriteProducts;
        return view('frontend.profile.edit-favorite', [
            'user' => $request->user(),
            'favorite_products' => $favorite_products
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        error_log($request->email);

        return view('frontend/profile/edit-confirm' ,compact('request'));
    }

        /**
     * Confirm the user's profile form.
     */
    public function editConfirm(Request $request): RedirectResponse
    {   
        error_log($request->user());

        // $request->user()->save();
        $user = User::find($request->user()->id)->update([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'age' => $request->age,
            'ballet_career' => $request->ballet_career,
            'ballet_level' => $request->ballet_level,
            'foot_shape' => $request->foot_shape,
            'foot_size' => $request->foot_size,
            'foot_width' => $request->foot_width,
            'foot_height' => $request->foot_height,
            'mail_magazin' => $request->mail_magazin,
        ]);

        $alert = array(
            'message' => '変更されました。',
            'alert-type' => 'success'
        );

        return Redirect::route('profile.edit')->with($alert);
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    /**
     * @param int $product_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function favoriteDelete($product_id) : RedirectResponse
    {

        $user = Auth::user();
        $product = Product::findOrFail($product_id);

        $user->favoriteProducts()->detach($product->id);
        return redirect()->route('profile.edit-favorite')->with('success', '削除しました。');
    }

    /**
     * @param int $product_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewDelete($review_id) : RedirectResponse
    {

        $product = ProductReview::find($review_id);
        $product->delete();

        return redirect()->route('profile.edit-review')->with('success', '削除しました。');
    }
    public function getReview(Request $request)
    {
        $product_review_id = $request->input('product_review_id');
        $product_review = ProductReview::where([
            'id' => $product_review_id,
            'user_id' => Auth::id(),
            'status' => 1
        ])->first();
    
        if (!$product_review) {
            return response()->json(['error' => '検索結果はありません'], 404);
        }
    
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $product_review->id,
                'product_id' => $product_review->product_id,
                'content' => $product_review->content,
                'purchase_size' => $product_review->purchase_size,
                'purchase_width' => $product_review->purchase_width,
                'shank' => $product_review->shank,
                'average_satisfaction' => $product_review->average_satisfaction,
                'comfort' => $product_review->comfort,
                'quietness' => $product_review->quietness,
                'lightness' => $product_review->lightness,
                'stability' => $product_review->stability,
                'longavity' => $product_review->longavity,
            ]
        ]);
    }

    public function updateReview(Request $request)
    {
        error_log($request);
        $product_review_id = $request->input('product_review_id');
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
            $existing_review = ProductReview::where(['user_id' => Auth::user()->id, 'product_id' => $product_id, 'id' => $product_review_id])->first();
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
                $existing_review->status = 1;
                $existing_review->update();
            }
            else {
                return redirect()->back()->with('status', 'The data does not exist.');
            }
            $alert = array(
                'message' => '変更されました。',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($alert);
        } 
        else {
            return redirect()->back()->with('status', 'The link you followed was broken');
        }
    }
}

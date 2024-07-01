<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Product;
use App\Models\ProductReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $product_reviews = ProductReview::where(['user_id' => Auth::user()->id, 'status' => 1])->orderBy('id', 'desc')->get();
        $user = Auth::user();
        $favorite_products = $user->favoriteProducts;
        return view('frontend.profile.edit', [
            'user' => $request->user(),
            'product_reviews' => $product_reviews,
            'favorite_products' => $favorite_products
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        $alert = array(
            'message' => '成果的に変更されました。',
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
        return redirect()->route('profile.edit')->with('success', 'Product removed from favorites.');
    }

    /**
     * @param int $product_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewDelete($review_id) : RedirectResponse
    {

        $product = ProductReview::find($review_id);
        $product->delete();

        return redirect()->route('profile.edit')->with('success', 'My review by product removed');
    }
}

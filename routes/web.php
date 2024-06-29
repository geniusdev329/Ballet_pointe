<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FirstPage\FaqController;
use App\Http\Controllers\Admin\FirstPage\PrivacyPolicyController;
use App\Http\Controllers\Admin\FirstPage\TouController;
use App\Http\Controllers\Admin\MakerController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/aboutme', [WelcomeController::class, 'aboutMe'])->name('about-me');
Route::get('/tos', [WelcomeController::class, 'tos'])->name('tos');
Route::get('/privacy', [WelcomeController::class, 'privacy'])->name('privacy');
Route::get('/faq', [WelcomeController::class, 'faq'])->name('faq');
Route::get('/contact', [WelcomeController::class, 'contact'])->name('contact');
Route::get('/infor_setting', [WelcomeController::class, 'infor_setting'])->name('infor_setting');
Route::get('/blogs', [WelcomeController::class, 'blogIndex'])->name('blogs');
Route::get('/blogs/{blog}', [WelcomeController::class, 'blogDetail'])->name('blogs.detail');
Route::post('/products-by-maker', [WelcomeController::class, 'searchByMaker'])->name('search-by-maker');
Route::post('/reviews-by-features', [WelcomeController::class, 'searchByFeatures'])->name('search-by-features');
Route::post('/products-by-name', [WelcomeController::class, 'searchByName'])->name('search-by-name');
Route::get('/products/{product}', [WelcomeController::class, 'productDetail'])->name('products.detail')->middleware('auth');
Route::post('/add-review', [WelcomeController::class, 'addReview'])->name('add-review');
Route::get('/notifications/{notifidatin}', [WelcomeController::class, 'detailNotification'])->name('detail-notification');
Route::get('/notifications', [WelcomeController::class, 'notificationList'])->name('notification-list');


Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->name('admin.')->group(function () {
  
    Route::get('home', [HomeController::class, 'adminHome'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('products', ProductController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('product-reviews', ProductReviewController::class);
    Route::resource('makers', MakerController::class);
    Route::prefix('first-page')->name('first-page.')->group(function () {
        Route::resource('privacy-policies', PrivacyPolicyController::class);
        Route::resource('tou', TouController::class);
        Route::resource('faq', FaqController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile/favorite-delete/{id}', [ProfileController::class, 'favoriteDelete'])->name('profile.favorite-delete');
    Route::delete('/profile/review-delete/{id}', [ProfileController::class, 'reviewDelete'])->name('profile.review-delete');
});

require __DIR__.'/auth.php';

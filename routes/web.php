<?php

use App\Http\Controllers\Admin\FirstPage\FaqController;
use App\Http\Controllers\Admin\FirstPage\PrivacyPolicyController;
use App\Http\Controllers\Admin\FirstPage\TouController;
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
Route::get('/balletpointe', [WelcomeController::class, 'balletpointe'])->name('balletpointe');
Route::get('/balletpointe_des', [WelcomeController::class, 'balletpointe_des'])->name('balletpointe_des');
Route::get('/search_1', [WelcomeController::class, 'search_1'])->name('search_1');
Route::get('/search_2', [WelcomeController::class, 'search_2'])->name('search_2');
Route::get('/infor_setting', [WelcomeController::class, 'infor_setting'])->name('infor_setting');
Route::get('/pointes', [WelcomeController::class, 'pointe_shoes'])->name('pointes');


Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->name('admin.')->group(function () {
  
    Route::get('home', [HomeController::class, 'adminHome'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('notifications', NotificationController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product-reviews', ProductReviewController::class);
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
});

require __DIR__.'/auth.php';

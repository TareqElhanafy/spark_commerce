<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('frontpage');

/**
 * Newsletters Routes
 */
Route::post('/add-new', 'Admin\NewsletterController@store')->name('add.newsletter');

/**
 *
 * Track orders Route
 */
Route::post('/track/order', 'Admin\OrderController@track')->name('track.order');

/**
 *
 * Return orders
 */
Route::get('/return-orders', 'HomeController@return')->name('front.return');
Route::get('/make-return-order/{id}', 'HomeController@MakeReturn')->name('return.order.make');

/**
 *
 * Wishlist Routes
 */
Route::group(['prefix' => 'wishlist'], function () {
    Route::get('/', 'Front\WishlistController@index')->name('wishlist');
    Route::get('/add-to-wishlist/{id}', 'Front\WishlistController@add')->name('AddToWishList');
    Route::get('/clear', 'Front\WishlistController@clear')->name('wishlist.clear');
});


/***
 *
 * Cart Routes
 */
Route::group(['prefix' => 'cart'], function () {
    Route::get('/add-to-cart/{id}', 'Front\CartController@add')->name('AddToCart');
    Route::get('/check', 'Front\CartController@check');
    Route::get('/show-cart', 'Front\CartController@show')->name('cart');
    Route::post('/update-qty-cart/{rowId}', 'Front\CartController@updateqty')->name('cart.update');
    Route::get('/delete-item/{rowId}', 'Front\CartController@destroy')->name('cart.delete');
    Route::get('/checkout', 'Front\CartController@checkout')->name('checkout');
    Route::post('/add-coupon', 'Front\CartController@coupon')->name('apply.coupon');
    Route::get('/remvoe-coupon', 'Front\CartController@removecoupon')->name('remove.coupon');
    Route::get('/payment', 'Front\CartController@payment')->name('payment');
    Route::post('/pay', 'Front\CartController@DoPayment')->name('do.payment');
    Route::post('/stripe-pay', 'Front\CartController@StripeCharge')->name('stripe.charge');

});

/**
 *
 * Product Routes
 */
Route::group(['prefix' => 'products'], function () {
    Route::get('/show/{id}/{name}', 'Front\ProductController@show')->name('front.show.product');
    Route::post('/add-product/{id}', 'Front\ProductController@addproducttocart')->name('front.product.add');
    Route::get('/subcategory/{id}/items', 'Front\ProductController@SubcategoryProducts')->name('front.subcategory.products');
    Route::get('/category/{id}/items', 'Front\ProductController@CategoryProducts')->name('front.category.products');
});


/**
 *
 * Languages Routes
 */
Route::group(['prefix' => 'langs'], function () {
    Route::get('/set-english', 'HomeController@setEn')->name('languages.en');
    Route::get('/set-arabic', 'HomeController@setAr')->name('languages.ar');
});

/**
 *
 * Blog Routes
 */
Route::group(['prefix' => 'blog'], function () {
    Route::get('/', 'BlogController@index')->name('blog');
    Route::get('/post/{id}', 'BlogController@post')->name('blog.post');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/user/logout', 'HomeController@logout')->name('user.logout');
});

Route::get('/register', function(){
    return redirect()->route('login');
});

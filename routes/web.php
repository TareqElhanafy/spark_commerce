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
 * Wishlist Routes
 */
Route::get('/add-to-wishlist/{id}', 'Front\WishlistController@add')->name('AddToWishList');

/***
 *
 * Cart Routes
 */
Route::group(['prefix' => 'cart'], function () {
    Route::get('/add-to-cart/{id}', 'Front\CartController@add')->name('AddToCart');
    Route::get('/check', 'Front\CartController@check');
    Route::get('/show-cart', 'Front\CartController@show')->name('cart');
    Route::post('/update-qty-cart/{rowId}', 'Front\CartController@updateqty')->name('cart.update');

});

/**
 *
 * Product Routes
 */
Route::group(['prefix' => 'products'], function () {
    Route::get('/show/{id}/{name}', 'Front\ProductController@show')->name('front.show.product');
    Route::post('/add-product/{id}', 'Front\ProductController@addproducttocart')->name('front.product.add');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/user/logout', 'HomeController@logout')->name('user.logout');
});

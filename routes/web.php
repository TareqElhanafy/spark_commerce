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

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@home')->name('home');
    Route::get('/user/logout', 'HomeController@logout')->name('user.logout');

    /**
     * Newsletters Routes
     */
    Route::post('/add-new','Admin\NewsletterController@store')->name('add.newsletter');
});

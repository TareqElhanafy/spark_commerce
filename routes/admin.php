<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('admin.logout');
    Route::get('/change-password', 'DashboardController@changePassowordForm')->name('admin.password.page');
    Route::post('/update-password', 'DashboardController@updatePassword')->name('admin.passwordUpdate');


    /**
     *
     * Category Routes
     */

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index')->name('admin.categories');
        Route::post('/add-category', 'CategoryController@store')->name('admin.categories.store');
        Route::get('/edit/{id}', 'CategoryController@edit')->name('admin.categories.edit');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.categories.delete');


    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/login', 'LoginController@index')->name('admin.login');
    Route::post('/login', 'LoginController@login')->name('admin.post.login');
});

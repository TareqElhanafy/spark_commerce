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
        Route::post('/update/{id}', 'CategoryController@update')->name('admin.categories.update');
        Route::get('/delete/{id}', 'CategoryController@destroy')->name('admin.categories.delete');
    });

    /**
     *
     * Sub-categories Routes
     */
    Route::group(['prefix'=>'sub-categories'], function(){
     Route::get('/','SubCategoryController@index')->name('admin.subcategories');
     Route::post('/add-sub-category','SubCategoryController@store')->name('admin.subcategories.store');
     Route::get('/edit/{id}','SubCategoryController@edit')->name('admin.subcategories.edit');
     Route::post('/update/{id}','SubCategoryController@update')->name('admin.subcategories.update');
     Route::get('/delete/{id}','SubCategoryController@destroy')->name('admin.subcategories.delete');

    });

    /**
     *
     * Brands Routes
     */
    Route::group(['prefix'=>'brands'], function(){
        Route::get('/','BrandController@index')->name('admin.brands');
        Route::post('/add-brand', 'BrandController@store')->name('admin.brands.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brands.edit');
        Route::post('/update/{id}', 'BrandController@update')->name('admin.brands.update');
        Route::get('/delete/{id}','BrandController@destroy')->name('admin.brands.delete');
    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/login', 'LoginController@index')->name('admin.login');
    Route::post('/login', 'LoginController@login')->name('admin.post.login');
});

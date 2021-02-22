<?php

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
    Route::get('/logout', 'DashboardController@logout')->name('admin.logout');
});

Route::group(['namespace' => 'Admin','middleware'=>'guest:admin'], function(){
Route::get('/login','LoginController@index')->name('admin.login');
Route::post('/login','LoginController@login')->name('admin.post.login');
});


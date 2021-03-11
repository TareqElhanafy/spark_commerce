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
    Route::group(['prefix' => 'sub-categories'], function () {
        Route::get('/', 'SubCategoryController@index')->name('admin.subcategories');
        Route::post('/add-sub-category', 'SubCategoryController@store')->name('admin.subcategories.store');
        Route::get('/edit/{id}', 'SubCategoryController@edit')->name('admin.subcategories.edit');
        Route::post('/update/{id}', 'SubCategoryController@update')->name('admin.subcategories.update');
        Route::get('/delete/{id}', 'SubCategoryController@destroy')->name('admin.subcategories.delete');
        Route::get('/get/subcategory/{category_id}', 'SubCategoryController@getsub')->name('admin.getsubcategories');
    });

    /**
     *
     * Brands Routes
     */
    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', 'BrandController@index')->name('admin.brands');
        Route::post('/add-brand', 'BrandController@store')->name('admin.brands.store');
        Route::get('/edit/{id}', 'BrandController@edit')->name('admin.brands.edit');
        Route::post('/update/{id}', 'BrandController@update')->name('admin.brands.update');
        Route::get('/delete/{id}', 'BrandController@destroy')->name('admin.brands.delete');
    });

    /**
     *
     * Coupons Routes
     */
    Route::group(['prefix' => 'coupons'], function () {
        Route::get('/', 'CouponsController@index')->name('admin.coupons');
        Route::post('/add-coupon', 'CouponsController@store')->name('admin.coupons.store');
        Route::get('/delete/{id}', 'CouponsController@destroy')->name('admin.coupons.delete');
        Route::get('/edit/{id}', 'CouponsController@edit')->name('admin.coupons.edit');
        Route::post('/update/{id}', 'CouponsController@update')->name('admin.coupons.update');
        Route::get('/delete/{id}', 'CouponsController@destroy')->name('admin.coupons.delete');
    });

    /**
     * Newsletters Routes
     */
    Route::group(['prefix' => 'newsletters'], function () {
        Route::get('/', 'NewsletterController@index')->name('admin.newsletters');
        Route::get('delete/{id}', 'NewsletterController@destroy')->name('admin.newsletters.delete');
    });

    /**
     *
     * SEO Routes
     */
    Route::group(['prefix'=>'seos'], function(){
      Route::get('/', 'SeoController@index')->name('admin.seo');
      Route::post('/add-new', 'SeoController@store')->name('admin.seo.store');
      Route::get('/edit/{id}', 'SeoController@edit')->name('admin.seo.edit');
      Route::post('/update/{id}', 'SeoController@update')->name('admin.seo.update');
      Route::get('/delete/{id}', 'SeoController@destroy')->name('admin.seo.delete');
    });

    /**
     *
     * Reports Routes
     */
    Route::group(['prefix'=>'reports'], function(){
        Route::get('/today-orders', 'ReportController@TodayOrders')->name('admin.reports.today.orders');
        Route::get('/today-delievery', 'ReportController@TodayDelievery')->name('admin.reports.today.delievery');
        Route::get('/search', 'ReportController@Search')->name('admin.reports.search');
        Route::post('/search-by-date', 'ReportController@SearchByDate')->name('admin.reports.search.by.date');
        Route::post('/search-by-year', 'ReportController@SearchByYear')->name('admin.reports.search.by.year');
        Route::post('/search-by-month', 'ReportController@SearchByMonth')->name('admin.reports.search.by.month');


    });

    /**
     *
     * Products Routes
     */
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index')->name('admin.products');
        Route::get('/create', 'ProductController@create')->name('admin.products.create');
        Route::post('/store', 'ProductController@store')->name('admin.products.store');
        Route::get('/delete/{id}', 'ProductController@destroy')->name('admin.products.delete');
        Route::get('/change-status/{id}', 'ProductController@changeStatus')->name('admin.products.status');
        Route::get('/edit/{id}', 'ProductController@edit')->name('admin.products.edit');
        Route::post('/update-product/{id}', 'ProductController@update')->name('admin.product.update');
    });

    /**
     *
     * Orders Routes
     */
    Route::group(['prefix'=>'orders'], function(){
        Route::get('/new-orders', 'OrderController@NewOrders')->name('admin.orders.new');
        Route::get('/canceled-orders', 'OrderController@CanceledOrders')->name('admin.orders.canceled');
        Route::get('/accepted-orders', 'OrderController@AcceptedOrders')->name('admin.orders.accepted');
        Route::get('/progressed-orders', 'OrderController@ProgressedOrders')->name('admin.orders.progressed');
        Route::get('/delievered-orders', 'OrderController@DelieveredOrders')->name('admin.orders.delievered');
        Route::get('/show/{id}', 'OrderController@show')->name('admin.orders.view');
        Route::get('/payment-accept/{id}', 'OrderController@AcceptPayment')->name('admin.orders.paymentaccept');
        Route::get('/cancel/{id}/order', 'OrderController@CancelOrder')->name('admin.orders.cancel');
        Route::get('/start-order/{id}/delievery', 'OrderController@StartDelievery')->name('admin.orders.startdelievery');
        Route::get('/delievey/{id}/done', 'OrderController@DelieveryDone')->name('admin.orders.delieverydone');

    });


    /**
     *Blog Routes
     */
    Route::group(['prefix' => 'blog'], function () {

     /*
     * PostCategory routes
     */
        Route::group(['prefix' => 'post-categories'], function () {
            Route::get('/', 'BlogController@index')->name('admin.blog.categories');
            Route::post('/add-new', 'BlogController@store')->name('admin.blog.categories.store');
            Route::get('/edit/{id}', 'BlogController@edit')->name('admin.blog.categories.edit');
            Route::post('/update/{id}', 'BlogController@update')->name('admin.blog.categories.update');
            Route::get('/delete/{id}', 'BlogController@destroy')->name('admin.blog.categories.delete');
        });
    /**
     *
     * Post Routes
     */

     Route::group(['prefix'=>'posts'], function(){
         Route::get('/','PostController@index')->name('admin.blog.posts');
         Route::get('/add-new', 'PostController@create')->name('admin.blog.posts.create');
         Route::post('/store', 'PostController@store')->name('admin.blog.posts.store');
         Route::get('/edit/{id}', 'PostController@edit')->name('admin.blog.posts.edit');
         Route::post('/update/{id}', 'PostController@update')->name('admin.blog.posts.update');
         Route::get('/delete/{id}', 'PostController@destroy')->name('admin.blog.posts.delete');
     });

    });
});

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/login', 'LoginController@index')->name('admin.login');
    Route::post('/login', 'LoginController@login')->name('admin.post.login');
});

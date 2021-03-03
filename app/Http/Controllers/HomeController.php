<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories  = Category::get();
        $brands  = Brand::get();
        $first_product = Product::status()->first();
        $products = Product::status()->limit(3)->orderBy('id','desc')->get();
        $on_sales = Product::status()->where('on_sale',1)->limit(3)->get();
        $mid_sliders = Product::status()->where('mid_slider',1)->get();
        $hot_deals = Product::status()->where('hot_deal',1)->limit(8)->get();
        $best_rateds = Product::status()->where('best_rated',1)->limit(8)->get();
        $get_ones =  Product::status()->where('get_one',1)->limit(8)->get();
        return view('welcome', compact('categories','first_product','products','on_sales','mid_sliders','hot_deals','best_rateds','get_ones','brands'));
    }


    public function home()
    {
        return view('home');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'successfully logout',
            'alert-type' => 'success',
        ]);
    }
}

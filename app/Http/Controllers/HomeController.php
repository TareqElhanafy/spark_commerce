<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $products = Product::status()->limit(16)->orderBy('id', 'desc')->get();
        $on_sales = Product::status()->where('on_sale', 1)->limit(4)->get();
        $mid_sliders = Product::status()->where('mid_slider', 1)->get();
        $hot_deals = Product::status()->where('hot_deal', 1)->limit(8)->get();
        $best_rateds = Product::status()->where('best_rated', 1)->limit(8)->get();
        $get_ones =  Product::status()->where('get_one', 1)->limit(8)->get();
        return view('welcome', compact('categories', 'first_product', 'products', 'on_sales', 'mid_sliders', 'hot_deals', 'best_rateds', 'get_ones', 'brands'));
    }


    public function home()
    {
        return view('home');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontpage')->with([
            'message' => 'successfully logout',
            'alert-type' => 'success',
        ]);
    }

    public function setEn()
    {
        $lang = Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'English');
        return redirect()->back();
    }
    public function setAr()
    {
        $lang = Session::get('lang');
        Session::forget('lang');
        Session::put('lang', 'Arabic');
        return redirect()->back();
    }

    public function return()
    {
        return view('front.return');
    }
    public function MakeReturn($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();
        if (!$order) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => 'There is no order with such an id',
            ]);
        }

        DB::table('orders')->where('id', $id)->update(['return_order' => 1]);
        return redirect()->back()->with([
            'alert-type' => 'success',
            'message' => 'The order return request has been sent',
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $products = Product::where('name', 'LIKE', "%$search%")->paginate(10);
        $categories = Category::all();
        $brands = Brand::all();
        return view('front.product.search', compact('products', 'brands', 'categories'));
    }
}

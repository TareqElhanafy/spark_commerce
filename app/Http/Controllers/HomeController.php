<?php

namespace App\Http\Controllers;

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
        $first_product = Product::first();
        return view('welcome', compact('categories','first_product'));
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

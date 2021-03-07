<?php

namespace App\Http\Controllers\Front;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id, $name)
    {
        $product = Product::find($id)->first();
        if (!$product) {
            return redirect()->route('frontpage')->with([
                'message' => ' Sorry!, This product is not exsisted .. try again later',
                'alert-type' => 'error'
            ]);
        }
        $color = $product->color;
        $colors = explode(',', $color);
        $size = $product->size;
        $sizes = explode(',', $size);
        return view('front.product.show', compact('product', 'colors', 'sizes'));
    }

    public function addproducttocart(Request $request, $id)
    {
        dd($request);
        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with([
                'message' => 'Sorry!, This product is not exsisted .. try again late',
                'alert-type' => 'error',
            ]);
        }
        if ($product->discount == null) {
            $data = [];
            $data['id'] = $id;
            $data['name'] = $product->name;
            $data['price'] = $product->price;
            $data['weight'] = 1;
            $data['qty'] = $request->quantity;
            $data['options']['image'] = $product->image;
            $data['options']['color'] = $request->color;
            $data['options']['size'] = $request->size;

            \Cart::add($data);
            return redirect()->back()->with([
                'message' => 'This product added to your cart succeessfully',
                'alert-type' => 'success',
            ]);
        }
        $data = [];
        $data['id'] = $id;
        $data['name'] = $product->name;
        $data['price'] = $product->discount;
        $data['weight'] = 1;
        $data['qty'] = $request->quantity;
        $data['options']['image'] = $product->image;
        $data['options']['color'] = $request->color;
        $data['options']['size'] = $request->size;
        \Cart::add($data);
        return redirect()->back()->with([
            'message' => 'This product added to your cart succeessfully',
            'alert-type' => 'success',
        ]);
    }
}

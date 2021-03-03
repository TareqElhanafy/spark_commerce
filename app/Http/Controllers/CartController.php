<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add($id)
    {
        if (!Auth::check()) {
            return response()->json([
                'alert' => 'warning',
                'message' => 'You must login first',
            ]);
        } else {
            $product = Product::find($id);
            if (!$product) {
                return response()->json([
                    'alert' => 'error',
                    'message' => 'This product does not exist',
                ]);
            }
            if ($product->discount == null) {
                $data = [];
                $data['id']=$id;
                $data['name']=$product->name;
                $data['price']=$product->price;
                $data['weight']=1;
                $data['qty']=$product->quantity;
                $data['options']['image']=$product->image;
                \Cart::add($data);
                return response()->json([
                    'alert' => 'success',
                    'message' => 'This product added to your cart succeessfully',
                ]);
            }
            $data = [];
            $data['id']=$id;
            $data['name']=$product->name;
            $data['price']=$product->discount;
            $data['weight']=1;
            $data['qty']=$product->quantity;
            $data['options']['image']=$product->image;
            \Cart::add($data);
            return response()->json([
                'alert' => 'success',
                'message' => 'This product added to your cart succeessfully',
            ]);
        }
    }
}

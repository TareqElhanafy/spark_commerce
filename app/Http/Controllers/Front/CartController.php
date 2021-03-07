<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
                $data['id'] = $id;
                $data['name'] = $product->name;
                $data['price'] = $product->price;
                $data['weight'] = 1;
                $data['qty'] = 1;
                $data['options']['image'] = $product->image_one;
                \Cart::add($data);
                return response()->json([
                    'alert' => 'success',
                    'message' => 'This product added to your cart succeessfully',
                ]);
            }
            $data = [];
            $data['id'] = $id;
            $data['name'] = $product->name;
            $data['price'] = $product->discount;
            $data['weight'] = 1;
            $data['qty'] = 1;
            $data['options']['image'] = $product->image_one;
            \Cart::add($data);
            return response()->json([
                'alert' => 'success',
                'message' => 'This product added to your cart succeessfully',
            ]);
        }
    }

    public function check()
    {
        return \Cart::Content();
    }

    public function show()
    {
        $content = \Cart::content();
        return view('front.cart.index', compact('content'));
    }

    public function updateqty(Request $request, $rowId)
    {
        \Cart::update($rowId, ['qty' => $request->qty]); // Will update the name
        return redirect()->back()->with([
            'message' => 'This product quantity updated succeessfully',
            'alert-type' => 'success',
        ]);
    }

    public function destroy($rowId)
    {
        \Cart::remove($rowId);
        return redirect()->back()->with([
            'message' => 'This product item deleted succeessfully',
            'alert-type' => 'success',
        ]);
    }
}

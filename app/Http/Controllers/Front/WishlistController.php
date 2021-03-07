<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function index()
    {
        $wishlistItems = Wishlist::get();
        return view('front.cart.wishlist', compact('wishlistItems'));
    }
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
            $existedWish = Wishlist::where('product_id', $id)->first();
            if ($existedWish) {
                return response()->json([
                    'alert' => 'info',
                    'message' => 'This product is already in your wishlist!',
                ]);
            }
            $newWish = Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $id
            ]);
            return response()->json([
                'alert' => 'success',
                'message' => 'This product added to your wishlist succeessfully',
            ]);
        }
    }
}

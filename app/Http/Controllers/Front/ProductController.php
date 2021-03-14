<?php

namespace App\Http\Controllers\Front;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id, $name)
    {
        $product = Product::find($id);
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

    public function SubcategoryProducts($id)
    {
        $subcategory = SubCategory::find($id);
        if (!$subcategory) {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'There are no products for this subcategory'
            ]);
        }

        $products = Product::where('subcategory_id', $id)->paginate(5);
        $categories = Category::get();
        $brands = $subcategory->products()->with('brand')
            ->get()
            ->pluck('brand')
            ->unique('id')
            ->values();
        return view('front.shop.subcategory.index', compact('products', 'categories', 'brands'));
    }
    public function CategoryProducts($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with([
                'alert-type' => 'danger',
                'message' => 'There are no products for this category'
            ]);
        }

        $products = Product::where('category_id', $id)->paginate(5);
        $categories = Category::get();
        $brands = $category->products()->with('brand')
            ->get()
            ->pluck('brand')
            ->unique('id')
            ->values();
        return view('front.shop.category.index', compact('products', 'categories', 'brands'));
    }
}

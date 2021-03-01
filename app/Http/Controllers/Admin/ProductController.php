<?php

namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::get();
        $subcategories = SubCategory::get();
        $brands = Brand::get();
        return view('admin.product.create', compact('categories', 'subcategories', 'brands'));
    }
    public function store(AddProductRequest $request)
    {
        $data=[];
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;
        $data['size']=$request->size;
        $data['color']=$request->color;
        $data['main_slider']=$request->main_slider;
        $data['mid_slider']=$request->mid_slider;
        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        if ($request->has('image_one')) {
            $data['image_one'] = $request->image_one->store('products');
        }
        if ($request->has('image_two')) {
            $data['image_two'] = $request->image_two->store('products');
        }
        if ($request->has('image_three')) {
            $data['image_three'] = $request->image_three->store('products');
        }
        if (!$request->has('status')) {
           $data['status']=0;
        } else {
            $data['status']=1;
        }
       $product = Product::create($data);

        return redirect()->route('admin.products')->with([
            'message'=>'New Product added successfully',
            'alert-type'=>'success',
        ]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with([
                'message'=>'There is no Product with such an id',
                'alert-type'=>'error',
            ]);
        }
        $categories = Category::get();
        $brands = Brand::get();

        return view('admin.product.edit', compact('product', 'categories','brands'));
    }

    public function update(AddProductRequest $request, $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with([
                'message'=>'There is no Product with such an id',
                'alert-type'=>'error',
            ]);
        }
        $data=[];
        $data['name']=$request->name;
        $data['description']=$request->description;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['quantity']=$request->quantity;
        $data['price']=$request->price;
        $data['size']=$request->size;
        $data['color']=$request->color;
        $data['main_slider']=$request->main_slider;
        $data['mid_slider']=$request->mid_slider;
        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        if ($request->has('image_one')) {
            Storage::delete($product->image_one);
            $data['image_one'] = $request->image_one->store('products');
        }
        if ($request->has('image_two')) {
            Storage::delete($product->image_two);
            $data['image_two'] = $request->image_two->store('products');
        }
        if ($request->has('image_three')) {
            Storage::delete($product->image_three);
            $data['image_three'] = $request->image_three->store('products');
        }
        if (!$request->has('status')) {
           $data['status']=0;
        } else {
            $data['status']=1;
        }
        $product->update($data);
        return redirect()->route('admin.products')->with([
            'message'=>'Product updated successfully',
            'alert-type'=>'success',
        ]);
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with([
                'message'=>'There is no Product with such an id',
                'alert-type'=>'error',
            ]);
        }
         if (isset($product->image_one)) {
            Storage::delete($product->image_one);
        }
        if (isset($product->image_two)) {
            Storage::delete($product->image_two);
        }
        if (isset($product->image_three)) {
            Storage::delete($product->image_three);
        }

        $product->delete();
        return redirect()->route('admin.products')->with([
            'message'=>'Product deleted successfully',
            'alert-type'=>'success',
        ]);
    }

    public function changeStatus($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.products')->with([
                'message'=>'There is no Product with such an id',
                'alert-type'=>'error',
            ]);
        }
       $status= $product->status == 1 ? 0 : 1 ;
        $product->update([
            'status'=>$status,
        ]);
        return redirect()->route('admin.products')->with([
            'message'=>"Product's status changed successfully",
            'alert-type'=>'success',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function store(AddCategoryRequest $request)
    {
     $category = Category::create([
         'name'=> $request->name,
     ]);
     return redirect()->route('admin.categories')->with([
         'message'=>'Category added successfully',
         'alert-type'=>'success',
     ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('admin.categories')->with([
                'message'=>'This Category not found',
                'alert-type'=>'error',
            ]);
        }
        $category->delete();
        return redirect()->route('admin.categories')->with([
            'message'=>'Category deleted successfully',
            'alert-type'=>'success',
        ]);
    }
}

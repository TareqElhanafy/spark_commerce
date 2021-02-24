<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSubcategoryRequest;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        $categories = Category::all();
        if ($categories->isEmpty()) {
            return redirect()->route('admin.categories')->with([
                'message' => 'You Must add Main Category first',
                'alert-type' => 'error',
            ]);
        }
        return view('admin.subcategory.index', compact('subcategories', 'categories'));
    }

    public function store(AddSubcategoryRequest $request)
    {
        $subCategory = SubCategory::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.subcategories')->with([
            'message' => 'Sub-Category add successfully',
            'alert-type' => 'success',
        ]);
    }
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            return redirect()->route('admin.subcategories')->with([
                'message' => 'There is no such sub-category !',
                'alert-type' => 'error'
            ]);
        }
        $categories = Category::all();
        if ($categories->isEmpty()) {
            return redirect()->route('admin.categories')->with([
                'message' => 'You Must add Main Category first',
                'alert-type' => 'error',
            ]);
        }
        return view('admin.subcategory.edit', compact('subCategory', 'categories'));
    }

    public function update(AddSubcategoryRequest $request, $id)
    {
        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            return redirect()->route('admin.subcategories')->with([
                'message' => 'There is no such sub-category !',
                'alert-type' => 'error'
            ]);
        }
        $subCategory->update([
            'name' => $request->name,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('admin.subcategories')->with([
            'message' => 'Sub-Category updated successfully',
            'alert-type' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        if (!$subCategory) {
            return redirect()->route('admin.subcategories')->with([
                'message' => 'There is no such sub-category !',
                'alert-type' => 'error'
            ]);
        }
        $subCategory->delete();
        return redirect()->route('admin.subcategories')->with([
            'message' => 'Sub-Category deleted successfully',
            'alert-type' => 'success',
        ]);
    }
}

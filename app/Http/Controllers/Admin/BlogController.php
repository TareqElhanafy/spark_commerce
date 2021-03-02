<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPostCategoryRequest;
use App\PostCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $categories = PostCategory::get();
        return view('admin.blog.category.index', compact('categories'));
    }

    public function store(AddPostCategoryRequest $request)
    {
        $category = PostCategory::create([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
        ]);

        return redirect()->route('admin.blog.categories')->with([
            'message' => 'New Post Category added successfully',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $category = PostCategory::find($id);
        if (!$category) {
            return redirect()->route('admin.blog.categories')->with([
                'message' => 'There is no category with such an id',
                'alert-type' => 'error'
            ]);
        }
        return view('admin.blog.category.edit', compact('category'));
    }

    public function update(AddPostCategoryRequest $request, $id)
    {
        $category = PostCategory::find($id);
        if (!$category) {
            return redirect()->route('admin.blog.categories')->with([
                'message' => 'There is no category with such an id',
                'alert-type' => 'error'
            ]);
        }

        $category->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ar' => $request->category_name_ar,
        ]);
        return redirect()->route('admin.blog.categories')->with([
            'message' => 'Post Category updated successfully',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $category = PostCategory::find($id);
        if (!$category) {
            return redirect()->route('admin.blog.categories')->with([
                'message' => 'There is no category with such an id',
                'alert-type' => 'error'
            ]);
        }
        $category->delete();
        return redirect()->route('admin.blog.categories')->with([
            'message' => 'Post Category deleted successfully',
            'alert-type' => 'success'
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPostRequest;
use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.blog.post.index', compact('posts'));
    }
    public function create()
    {
        $categories = PostCategory::get();
        return view('admin.blog.post.create', compact('categories'));
    }

    public function store(AddPostRequest $request)
    {
        $post = Post::create([
            'category_id' => $request->category_id,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
            'image' => $request->image->store('blogs/posts'),
        ]);

        return redirect()->route('admin.blog.posts')->with([
            'message' => 'New post added successfully',
            'alert-type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return  redirect()->route('admin.blog.posts')->with([
                'message' => 'There is no post with such an id',
                'alert-type' => 'error'
            ]);
        }
        $categories = PostCategory::get();
        return view('admin.blog.post.edit', compact('post', 'categories'));
    }

    public function update(AddPostRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return  redirect()->route('admin.blog.posts')->with([
                'message' => 'There is no post with such an id',
                'alert-type' => 'error'
            ]);
        }
        if ($request->has('image')) {
            Storage::delete($post->image);
            $image = $request->image->store('blogs/posts');
        } else {
            $image = $post->image;
        }
        $post->update([
            'category_id' => $request->category_id,
            'title_en' => $request->title_en,
            'title_ar' => $request->title_ar,
            'details_en' => $request->details_en,
            'details_ar' => $request->details_ar,
            'image' => $image,
        ]);
        return redirect()->route('admin.blog.posts')->with([
            'message' => 'post updated successfully',
            'alert-type' => 'success',
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return  redirect()->route('admin.blog.posts')->with([
                'message' => 'There is no post with such an id',
                'alert-type' => 'error'
            ]);
        }

        Storage::delete($post->image);
        $post->delete();
        return redirect()->route('admin.blog.posts')->with([
            'message' => 'post deleted successfully',
            'alert-type' => 'success',
        ]);
    }
}

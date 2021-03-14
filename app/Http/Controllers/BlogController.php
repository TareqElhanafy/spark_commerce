<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('front.blog.index', compact('posts'));
    }

    public function post($id)
    {
        $post = Post::find($id)->first();
        if (!$post) {
            return redirect()->route('blog')->with([
                'alert-type' => 'danger',
                'message' => 'Sorry This post not exist try again later !'
            ]);
        }
        $posts = Post::get();
        return view('front.blog.show', compact('post', 'posts'));
    }
}

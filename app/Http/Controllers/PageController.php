<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PageController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }
    public function about()
    {
        return view('pages.about');
    }

    public function profile(Post $post)
    {
        $posts = Post::where('user_id', auth()->user()->id)->latest()->simplePaginate(4);
        return view('pages.profile', compact('posts'));
    }
}

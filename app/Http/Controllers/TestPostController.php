<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
   public function index(){
   	return view('posts.index');
   }
   public function show(Post $post){
   	// query data manual tidak menggunakan model binding
   	//$post = Post::where('slug', $slug)->firstOrFail();
   	return view('posts.show', compact('post'));
   }
}

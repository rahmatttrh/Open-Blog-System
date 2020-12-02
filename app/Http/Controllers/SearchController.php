<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{
   public function post(){
   	$query = request('query');
   	$posts = Post::where("title","like","%$query%")->latest()->paginate(4);

   	return view('posts.index', compact('posts','query'));
   }
}

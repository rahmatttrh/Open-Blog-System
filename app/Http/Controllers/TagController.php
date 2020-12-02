<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
   public function show(Tag $tag){
   	$posts = $tag->posts()->latest()->simplePaginate(4);
   	return view('posts.index', compact('posts','tag'));
   }
}

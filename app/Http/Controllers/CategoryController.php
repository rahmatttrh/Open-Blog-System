<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
   public function show(Category $category){
   	$posts = $category->posts()->latest()->simplePaginate(4);
   	return view('posts.index', compact('posts', 'category'));
   }
}

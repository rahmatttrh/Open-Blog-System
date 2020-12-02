<?php

namespace App\Http\Controllers;

use App\{Post, Category, Tag};
use Illuminate\Http\Request;



class PostController extends Controller
{

   public function index()
   {
      $posts = Post::latest()->simplePaginate(4);
      return view('posts.index', ['posts' => $posts]);
   }


   public function show(Post $post)
   {
      $posts = Post::where('category_id', $post->category_id)->latest()->limit(3)->get();
      return view('posts.show', compact('post', 'posts'));
   }


   public function create()
   {
      return view('posts.create', [
         'post' => new Post(),
         'categories' => Category::get(),
         'tags' => Tag::get()

      ]);
   }
   public function store()
   {

      //Menyimpan data ke database
      //validation
      $attr = $this->validateReq();
      $slug = \Str::slug(request('title'));
      $attr['slug'] = $slug;

      if (request()->file('image')) {
         $image = request()->file('image')->store("images/posts");
      } else {
         $image = null;
      }



      $attr['category_id'] = request('category');
      $attr['image'] = $image;

      $post = auth()->user()->posts()->create($attr);
      $post->tags()->attach(request('tags'));

      //membuat flash message
      session()->flash('success', 'Post baru berhasil di tambahkan.');
      return redirect()->to('posts');
   }


   public function edit(Post $post)
   {
      return view('posts.edit', [
         'post' => $post,
         'categories' => Category::get(),
         'tags' => Tag::get()
      ]);
   }
   public function update(Post $post)
   {
      $attr = $this->validateReq();
      $this->authorize('update', $post);

      if (request()->file('image')) {
         \Storage::delete($post->image);
         $image = request()->file('image');
         $imageUrl = $image->store("images/posts");
      } else {
         $imageUrl = $post->image;
      }



      $attr['category_id'] = request('category');
      $attr['image'] = $imageUrl;

      $post->update($attr);
      $post->tags()->sync(request('tags'));

      //membuat flash message
      session()->flash('success', 'Post berhasil di edit.');
      return redirect()->to('posts');
   }


   //delete post
   public function destroy(Post $post)
   {

      $this->authorize('delete', $post);

      \Storage::delete($post->image);
      $post->tags()->detach();
      $post->delete();

      session()->flash('danger', 'Post berhasil dihapus.');
      return redirect()->to('posts');
   }


   public function validateReq()
   {
      return request()->validate([
         'title' => 'required|min:3',
         'body' => 'required',
         'category' => 'required',
         'tags' => 'required|array',
         'image' => 'image|mimes:jpeg,png,jpg|max:2048'
      ]);
   }
}

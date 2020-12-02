<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	//menentukan field yg boleh diisi dari form
   protected $fillable = ['title', 'slug', 'body','category_id','image'];
   protected $with = ['author', 'tags','category'];
   public function category(){
   	return $this->belongsTo(Category::class);
   }

   //post bisa memiliki banyak tag
   public function tags(){
   	return $this->belongsToMany(Tag::class);
   }

   //Relasi ke user table - user_id
   public function author(){
   	return $this->belongsTo(User::class, 'user_id');
   }
}

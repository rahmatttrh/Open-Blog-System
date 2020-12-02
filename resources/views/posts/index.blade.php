@extends('layouts.app')
@section('title', 'Blog')
@section('content')
	<div class="container py-5">
		{{-- @auth
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
			  {{ session('status') }}
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			  {{ 'Halo, '.  Auth::user()->name  }}
			</div>
		@endauth --}}

		@isset($category)
			<p class="mb-3 text-secondary">Category : {{$category->name}}</p>
		@endisset

		@isset($tag)
			<p class="mb-3 text-secondary">Tag : {{$tag->name}}</p>
		@endisset

		@isset($query)
			<p class="mb-3 text-secondary">Pencarian : {{$query}}</p>
		@endisset
		
		

		<hr>
		<div class="row">
			<div class="col-md-8">

				@include('layouts.alert')

				@if($posts->count())
					@foreach($posts as $post)
					
						<div style="border: none; border-radius: 0;" class="card shadow-sm p-2 mb-3 bg-white " >
						  	<div class="row no-gutters">
						    	<div class="col-md-4">
						    		<a href="/posts/{{$post->slug}}">
						      		<img style="display: block;
										  width: 100%;
										  height: 220px;
										  object-fit: cover;" src="{{asset("/storage/".$post->image)}}" class="card-img" alt="...">
						      	</a>
						    	</div>
						    	<div class="col-md-8">
						      	<div class="card-body">
						      		<div>
						      			<a class="text-secondary" href="/categories/{{$post->category->slug}}"><small>{{$post->category->name}} &middot</small></a>
						      			@foreach($post->tags as $tag)	
												<a href="/tags/{{$tag->slug}}" class="text-secondary mr-1"><small>{{$tag->name}}</small></a>
											@endforeach
						      		</div>
						      		
						      		<a href="/posts/{{$post->slug}}" class="text-dark"><h4>{{$post->title}}</h4></a>
										<p class="text-secondary">{!!Str::limit($post->body, 110)!!}</p>
										<div class="d-flex justify-content-between mt-4">
											<div class="text-secondary">{{$post->author->name}}</div>
											<p ><small class="text-muted">Di posting {{$post->created_at->diffForHumans()}}</small></p>
										</div>
									</div>
						    	</div>
							</div>
						</div>
						
					@endforeach
				@else
					<div class="alert alert-info">
						Post kosong
					</div>
				@endif
				
				{{$posts->links()}}
			</div>
			<div class="col-md-4">
				@include('layouts.deskripsi')

				{{-- category --}}
				@include('layouts.category')
			</div>
		</div>
	</div>








							

							
@endsection
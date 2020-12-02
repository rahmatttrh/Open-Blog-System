@extends('layouts.app')
@section('title', 'About')
@section('content')
	<div class="container mt-2 py-5 min-vh-100">
		<div class="row">
			<div class="col-md-4">
				<div style="border: none; border-radius: 0" class="card  p-2  bg-dark text-light">
					<div class="card-body">
						<h5>{{Auth::user()->name}}</h5>
						<hr>
						<div>{{Auth::user()->email}}</div>
						<div>{{'@'.Auth::user()->username}}</div>
					</div>
				</div>
				<div style="border: none; border-radius: 0" class="card  p-1 mb-3 bg-info text-light">
					<div class="card-body">
						<div><small>Bergabung sejak {{Auth::user()->created_at->format('d F Y')}}</small></div>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				@if($posts->count())
					@foreach($posts as $post)
					
						<div style="border: none; border-radius: 0;" class="card shadow-sm  mb-3 bg-white " >
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
										<div class="d-flex justify-content-between align-items-center mt-4">
											<small class="text-muted">Di posting {{$post->created_at->diffForHumans()}}</small>
											<div class="ml-auto d-flex">
												<a style="border-radius: 0;" href="/posts/{{$post->slug}}/edit" class=" mt-2 mr-2 btn btn-sm btn-light">Edit</a>
												<form action="/posts/{{$post->slug}}/delete" method="post">
													@csrf
													@method('delete')
													<button style="border-radius: 0;" type="submit" class="mt-2 btn btn-sm btn-light">Hapus</button>
												</form>
											</div>
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
		</div>
	</div>
@endsection
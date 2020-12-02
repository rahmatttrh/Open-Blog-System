@extends('layouts.app')

@section('title', $post->title)
@section('content')
	<div class="container py-5 min-vh-100">
		<hr>
		<div class="row">
			<div class="col-md-8">
				<div style="border: none; border-radius: 0;overflow-y: hidden" class="card shadow mb-3 bg-white">
					
					<img style="height: 300px; object-fit: cover;" class="card-img-top" src="{{asset("/storage/".$post->image)}}" alt="">
						
					<div class="card-body">
						<h1>{{$post->title}}</h1>
						<a class="text-secondary" href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
						<small>&middot {{$post->created_at->format("d F, Y")}}</small>

						<div class="media mt-2">
							<img width="50" class="rounded-circle mr-3" src="{{$post->author->gravatar()}}" alt="">
							<div class="media-body">
								<div>
									{{$post->author->name}}
								</div>
								<div class="text-secondary">
										{{'@'.$post->author->username}}
								</div>
							</div>
						</div>

						<p>{!!$post->body!!}</p>	
					</div>

					<div class="card-footer d-flex align-items-center">
						@foreach($post->tags as $tag)	
							<a href="/tags/{{$tag->slug}}" class="badge badge-info mr-1"><small>{{$tag->name}}</small></a>
						@endforeach
						<div class="ml-auto">
							@can('update', $post)
							<button type="button" class="btn btn-sm btn-light mt-2" data-toggle="modal" data-target="#myModal">Delete</button>
							<a href="/posts/{{$post->slug}}/edit" class=" mt-2 btn btn-sm btn-light">Edit</a>
							@endcan

							<!-- Modal -->
							<div id="myModal" class="modal fade" role="dialog">
							  <div class="modal-dialog">

							    <!-- Modal content-->
							    <div class="modal-content">
							      <div class="modal-header">
							        <h4 class="modal-title">Yakin ingin menghapus?</h4>
							        <button type="button" class="close" data-dismiss="modal">&times;</button>
							      </div>
							      <div class="modal-body">
							        <p class="mb-0">Judul : {{$post->title}}</p>
							        <small class="text-secondary">Published at {{$post->created_at->format('d M, y')}}</small>
							        <form action="/posts/{{$post->slug}}/delete" method="post">
										@csrf
										@method('delete')
										<button type="submit" class="mt-2 btn btn-sm btn-secondary px-4">Ya</button>
									</form>
							      </div>
							    </div>
							  </div>
							</div>	
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				@include('layouts.deskripsi')

				@include('layouts.category')

				<div class="mt-4">
					<p class="text-secondary ">Post yang berkaitan</p>
					@foreach($posts as $post)
						<div style="border: none" class="card shadow-sm p-2 mb-2 bg-white" >
						  	<div class="row no-gutters">
						    	<div class="col-4">
						    		<a href="/posts/{{$post->slug}}">
						      		<img style="display: block;
										  width: 100%;
										  height: 100px;
										  object-fit: cover;" src="{{asset("/storage/".$post->image)}}" class="card-img" alt="...">
						      	</a>
						    	</div>
						    	<div class="col-8">
						      	<div class="card-body">
						      		<a href="/posts/{{$post->slug}}" class="text-dark"><h5>{{$post->title}}</h5></a>
										{{-- <p class="text-secondary">{!!Str::limit($post->body, 50)!!}</p> --}}
										{{-- <div class="d-flex justify-content-between mt-4">
											<div class="text-secondary">{{$post->author->name}}</div>
											<p ><small class="text-muted">Di posting {{$post->created_at->diffForHumans()}}</small></p>
										</div> --}}
									</div>
						    </div>
						  </div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection
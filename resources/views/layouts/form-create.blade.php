<form action="/posts/store" method="post" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" id="title" class="form-control @error('title')is-invalid @enderror">
		@error('title')
			<small class="invalid-feedback mt-1 font-italic">{{$message}}</small>
		@enderror
	</div>


		<div class="form-row">
		    <div class="col">
		      <div class="form-group">
					<label for="category">Category</label>
					<select name="category" id="category" class="form-control @error('category')is-invalid @enderror"">
						<option disabled selected>Select one..</option>
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
				
					</select>
					@error('category')
						<small class="text-danger font-italic">{{$message}}</small>
					@enderror
				</div>
		    </div>
		    <div class="col">
		      <div class="form-group">
					<label for="tags">Tag</label><br>
					<select name="tags[]" id="tags" class="form-control select2" multiple>
						
						@foreach($tags as $tag)
						<option value="{{$tag->id}}">{{$tag->name}}</option>
						@endforeach
				
					</select>
					@error('tags')
					<div class="text-danger">
						<small class="text-danger font-italic">{{$message}}</small>
					</div>
						
					@enderror
				</div>
		    </div>
	  	</div>
	  	<div class="form-group">
	  		<label for="category">Gambar</label><br>
			<input  type="file" name="image" id="image">
			@error('image')
				<div class="text-danger">
					<small class="text-danger font-italic">{{$message}}</small>
				</div>
			@enderror
		</div>

	<div class="form-group">
		<label for="body">Article</label>
		<textarea rows="10" cols="30" name="body" id="summary-ckeditor" class="form-control @error('body')is-invalid @enderror"></textarea>
		@error('body')
			<small class="invalid-feedback mt-1 font-italic">{{$message}}</small>
		@enderror
	</div>
	<button type="submit" class="btn btn-sm btn-light">Save</button>
</form>
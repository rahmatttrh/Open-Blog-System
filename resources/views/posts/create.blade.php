@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
	<div class="container py-5">
		<hr>
		<div class="row justify-content-center min-vh-100">
			<div class="col-md-8">
				<div style="border: none" class="card shadow p-2 mb-3 bg-white">
					<div class="card-header text-center">
						<h5>Buat artikel</h5>
					</div>
					<div class="card-body">
						@include('layouts.form-create')
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
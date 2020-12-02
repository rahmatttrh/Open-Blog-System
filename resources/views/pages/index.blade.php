@extends('layouts.app')
@section('title', 'Home')
@section('content')
	<div class="container mt-2 py-5">
		@auth
		<div class="card mb-2">
          <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif

              {{ __('You are logged in!') }}
          </div>
      </div>
		@endauth

		<div class="jumbotron text-center">
		  <h1 class="text-secondary display-4 font-weight-bold">Selamat Datang</h1>
		  <p class="lead">Ini adalah aplikasi blog sederhana menggunakan Laravel 7</p>
		  <hr class="my-4">
		  <a class="btn btn-outline-secondary btn-sm btn-lg" href="/posts" role="button">Lihat post</a>
		</div>
		<div class="row text-center">
			<div class="col-md-4 mb-2">
				<div class="card c1 bg-info">
					<div class="card-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta adipisci, totam aliquam!</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-2">
				<div class="card c2 bg-warning">
					<div class="card-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta adipisci, totam aliquam!</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-2">
				<div class="card c3 bg-dark text-white">
					<div class="card-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta adipisci, totam aliquam!</p>
					</div>
				</div>
			</div>
		</div>

		<div class="row mt-4 ">
			<div class="col-md-8 mb-2">
				<div class="card min-vh-90">
					<div class="card-header">
						Rahmat Hidayat
					</div>
					<div class="card-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut impedit provident fuga illum non iusto perspiciatis quos, nam distinctio repudiandae. Nam necessitatibus atque assumenda ea, dolores mollitia? Porro ipsa totam eum, iure laborum nesciunt temporibus tempore, commodi molestiae quibusdam voluptates. Molestiae atque aliquam quam nam, sint deleniti, nihil. Assumenda fugit distinctio blanditiis perferendis reprehenderit, quasi fuga illo, eaque aliquid tempore odit voluptatibus magnam deleniti, quaerat veritatis eum.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 mb-2">
				<div class="card min-vh-70">
					<div class="card-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis quae beatae officiis veritatis, ab quidem alias, sint eaque nihil! Sint ipsum quaerat beatae totam quia voluptate veniam placeat! Ab minus aut earum repudiandae consequatur sint nisi! Atque nisi quaerat vel assumenda reiciendis odio provident dolores.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
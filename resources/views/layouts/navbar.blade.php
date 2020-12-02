<nav class="navbar fixed-top navbar-expand-lg navbar-light">
  <div class="container">
      <a class="navbar-brand" href="/"> 
      <img src="{{asset('/img/iceberg.png')}}" style="width: 40px; " alt="">
      MY Laravel</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link{{ request()->is('/') ? ' active' : ''}}" href="/">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link{{ request()->is('about')? ' active' : ''}}" href="/about">About</a>
          <a class="nav-item nav-link{{request()->is('posts') ? ' active' : ''}}" href="/posts">Blog</a>

          {{-- <a class="btn btn-outline-secondary ml-2 btn-sm nav-item nav-link" href="/posts">New post</a> --}}
          {{-- <div class="nav-item nav-link">
            <a href="/posts/create" class="btn btn-sm btn-info">New post</a>
          </div> --}}
          
        </div>
      </div>
  </div>
</nav>
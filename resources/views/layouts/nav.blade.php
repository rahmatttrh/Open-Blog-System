<nav class="navbar fixed-top navbar-expand-md navbar-light bg-white shadow-md">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h4 class="font-weight-bolder ">MY<span class="text-info">Blog</span></h4>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>



        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav ">
                <form action="{{ route('search.posts') }}" class="form-inline" method="get">
                    <input style="border-radius: 0" name="query" class="form-control sm-2" type="search" placeholder="Cari artikel">
                    <button style="border-radius: 0" class="btn btn-dark w-sm-auto " type="submit">Cari!</button>
                </form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto mt-2 mt-md-0">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a style="border-radius: 0;" class="nav-link px-3 btn btn-sm btn-info text-light" href="{{ route('login') }}">Login</a>
                    </li>
                    {{-- @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif --}}
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Halo, <span class="font-weight-bolder">{{Auth::user()->name }}</span> <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ route('posts.create') }}" class="dropdown-item">New Post</a>
                            <a href="{{ route('mypost') }}" class="dropdown-item">My Post</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
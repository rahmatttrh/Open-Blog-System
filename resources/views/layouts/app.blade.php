<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MYBlog</title>
    <link rel="icon" href="{{asset('/img/iceberg.png')}}">
   
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Montaga&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background: #f5efef;">

    <div id="app">
        @include('layouts.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<div class="py-5 d-flex alig-items-center justify-content-center bg-dark">
   <small class="text-secondary">MY<span class="text-warning">Blog</span>  Copyright</small> 
  
</div>
   
   
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor' );
    </script>

</body>
</html>

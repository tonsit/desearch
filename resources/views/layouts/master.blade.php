{{-- master.blade.php
    This is the master layout for all the views.
    --}}
<html>
    <head>
        <title>@yield('title')</title>
        {{-- Load 3rd party css libraries --}}
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.css" rel="stylesheet" />
        {{-- Establish viewport --}}
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        @section('navigation')
        <div class="container">
            <a href='{{url('/')}}'>
                <div class="main btn btn-primary">
                    <h2>Home</h2>
                </div>
            </a>
        </div>
        @show
        <div class="container">
            @yield('content')
        </div>
        @show
        <div class="container">
            @yield('query')
        </div>
        {{-- Load 3rd party javascript libraries --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox-plus-jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
     </body>    
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Layout</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="main-container d-flex">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- /.Sidebar -->
      
        <main class="content">
      
          <!-- Navbar -->
            @include('layouts.navbar')
          <!-- /.navbar -->
          
          <div class = 'mt-3 mx-3'>
            @yield('content')
          </div>
          
        </main>
      
      </div>
      
      @yield('javascript')
</body>
</html>
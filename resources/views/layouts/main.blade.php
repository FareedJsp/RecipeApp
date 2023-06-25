<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Layout</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
</head>
<body>
    <div class="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- /.Sidebar -->
      
        <div class="main">
      
          <!-- Navbar -->
          @include('layouts.header')
          <!-- /.navbar -->

          <main class="content px-3 py-2">
            <div class="container-fluid">
              <div class="mb-3">
                @yield('content')
              </div>
            </div>
          </main>
          
        </div>
      
    </div>
    @stack('javascript')
</body>
</html>
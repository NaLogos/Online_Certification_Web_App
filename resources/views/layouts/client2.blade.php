<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }}">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="">
            <img class="logo-dark" src="{{ asset('img/logo.png') }}" alt="logo" width= "84px" height= "15px">
            <img class="logo-light" src="{{ asset('img/logo.png') }}" alt="logo" width= "84px" height= "15px">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>
        </section>
        @guest
          <a class="btn btn-sm btn-round btn-success ml-4" href="/login">Log In</a>
          <a class="btn btn-sm btn-round btn-light ml-4" href="/register">Register</a>
        @endguest
        @auth
          <a class="btn btn-sm btn-round btn-success mr-4" href="/dashboard">Dashboard</a>
          <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn btn-sm btn-round btn-info " type="submit">Logout</button>
        </form>
        @endauth
        
      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->
        @yield('header')
    <!-- /.header -->


    <!-- Main Content -->
        @yield('content')


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="/"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com/thethemeio"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com/thethemeio"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com/thethemeio/"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com/thethemeio"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

    
        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>

  </body>
</html>

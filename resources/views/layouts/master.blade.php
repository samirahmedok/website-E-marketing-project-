<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <title>Boutique | Ecommerce bootstrap template</title> --}}
  <title>
    @yield('title')
  </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{asset('assets/vendor/lightbox2/css/lightbox.min.css')}}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{asset('assets/vendor/nouislider/nouislider.min.css')}}">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="{{asset('assets/vendor/owl.carousel2/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/owl.carousel2/assets/owl.theme.default.css')}}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('assets/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

      @yield('css')
  </head>

  <body>
    @include('layouts.header')

    <div class="container">
      @include('layouts.flashes')
        @yield('content')
    </div>

    @include('layouts.footer')

      <!-- JavaScript files-->
      <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('assets/vendor/lightbox2/js/lightbox.min.js')}}"></script>
      <script src="{{asset('assets/vendor/nouislider/nouislider.min.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
      <script src="{{asset('assets/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
      <script src="{{asset('assets/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
      <script src="{{asset('assets/js/front.js')}}"></script>

    

      

      @yield('scripts')
  </body>

</html>
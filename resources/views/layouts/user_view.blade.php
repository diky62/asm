<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>PT. Angga Saputra Mandiri</title>

  <!-- Font Awesome Icons -->
  <link href="{{asset('user/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="{{asset('user/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="{{asset('user/css/creative.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="{{asset ('gambar/logo-panjang.png')}}" width="200" style="padding-top: 5px"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('schedule_luar')}}">Schedule</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{url('login')}}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Diki Darmawan Fitriyadi</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('user/vendor/jquery/jquery.min.j')}}s"></script>
  <script src="{{asset('user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('user/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('user/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('user/js/creative.min.js')}}"></script>

</body>

</html>

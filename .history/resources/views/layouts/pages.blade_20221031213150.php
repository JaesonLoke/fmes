<!DOCTYPE html>
<html>

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Productions starts with a nice system.">
  <title>F-MES</title>

  @livewireStyles

<!-- Favicon -->
<link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<!-- Extra details for Live View on GitHub Pages -->

<!-- Icons -->
<link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet" type="text/css">
<link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<!-- Argon CSS -->
<link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.2.0" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.2/tailwind.min.css" integrity="sha512-l7qZAq1JcXdHei6h2z8h8sMe3NbMrmowhOl+QkP3UhifPpCW2MC4M0i26Y8wYpbz1xD9t61MLT9L1N773dzlOA==" crossorigin="anonymous" />

<!-- data table -->
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css


  @livewireStyles
</head>

<body class="{{$background}}">
  <!-- Sidenav -->
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

  @include('layouts.navbars.sidebar')

  <!-- Main content -->
  <div class="main-content" id="panel">    
    <!-- Top header -->
    @include('layouts.headers.header')

    @yield('content')
      <!-- Footer -->
      @include('layouts.footers.guest')


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/clipboard/dist/clipboard.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.2.0"></script>

  <!-- data table -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

</body>
@yield('scripts')

@livewireScripts

@stack('script')

</html>
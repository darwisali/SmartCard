<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="@yield('scan-refresh')" content="@yield('scan-time')">
  <title>Mashrof Ma'hady | @yield('title')</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="{{ asset ('css/styles.min.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
  <style>
    a {
        color: #00a651;
    }
  </style>
</head>

<body>
  @include('sweetalert::alert')

  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('layouts/sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
    @include('layouts/header')
      <!--  Header End -->
    <div class="container-fluid">

    @yield('contents')
    
    @include('layouts/footer')
      </div>
    </div>
  </div>
  <script src="{{ asset('libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('js/app.min.js') }}"></script>
  <script src="{{ asset('libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
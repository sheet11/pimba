
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PEMINJAMAN BARANG POLTEKKES KEMENKES | @yield('subTitle')</title>
    <link rel="icon" href="{{ asset('assets/src/logo.png') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    {{-- <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/assets/font-awesome/css/font-awesome.min.css') }}"> --}}
    <!-- Theme style -->

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
    <!-- End Datatables -->

    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/skins/_all-skins.min.css') }}">

    {{-- Toast Notification Asset --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

    {{-- Date & Time Picker --}}
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/timepicker/bootstrap-timepicker.min.css') }}">

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @stack('styles')

    <style>
        .skin-blue .sidebar-menu>li.active>a {
            border-left-color: #ffffff !important;
        }
        .sidebar-menu>li.active>a {
            background: #1e282c !important;
        }
    </style>
  </head>
  <body class="hold-transition skin-blue @yield('collapse') fixed sidebar-mini">
    <div class="preloader">
      <div class="do-loader"></div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><i class="fa fa-home"></i></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg" style="font-size:14px;"><b>PEMINJAMAN BARANG POLTEKKES KEMENKES</b> </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel" style="padding: 14px 10px !important;">
            <div class="pull-left image">
              <img src="{{ asset('assets/images/logo1.png') }}" alt="User Image">
            </div>
            <div class="pull-left info" style="padding: 4px 5px 5px 15px;">
              <p>Selamat Datang,</p>
              <a href="#" style="text-transform: capitalize; font-size:13px !important;"><i class="fa fa-user"></i> @yield('user-login')</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
              @include('layouts.sidebar')
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            PEMINJAMAN BARANG POLTEKKES KEMENKES
            <small>KOTA BENGKULU</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i>PEMINJAMAN BARANG POLTEKKES KEMENKES</a></li>
            <li><a href="#">@yield('page')</a></li>
            <li class="active">@yield('subPage')</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>KOTA BENGKULU</b>
        </div>
        <strong>Copyright &copy; 2023 <a href="">PEMINJAMAN BARANG POLTEKKES KEMENKES</a>.</strong> BENGKULU
        reserved.
      </footer>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="{{ asset('assets/register/js/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/register/js/bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->

    <!-- DataTables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <!-- End Datatables -->

    <script src="{{ asset('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('assets/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>

    {{-- Toast Notification asset --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>

    {{-- Date & Time Picker --}}
    <script src="{{ asset('assets/timepicker/bootstrap-timepicker.min.js') }}"></script>

    {{-- Font Awesome --}}bootstrap-datepicker.min.js
    <script src="https://kit.fontawesome.com/055120b175.js" crossorigin="anonymous"></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    {{-- Sidebar Setting --}}
    <script>
    $(document).ready(function () {
        $('.sidebar-menu').tree()
    })
    </script>

    <script>

    // Toast Notification Setting
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
            toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'warning':
            toastr.options = {"closeButton": true,"debug": false,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","extendedTimeOut": "1000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'success':
            toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
            toastr.options = {"closeButton": true,"progressBar": true,"positionClass": "toast-top-right","showDuration": "300","hideDuration": "1000","timeOut": "10000","showEasing": "swing","hideEasing": "linear","showMethod": "fadeIn","hideMethod": "fadeOut"};
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif

    $(document).ready(function() {
        $('.select2').select2();
    });
    </script>

    @stack('scripts')
  </body>
</html>
f

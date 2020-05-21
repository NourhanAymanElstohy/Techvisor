
@include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('admin.layouts.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 
  @include('admin.layouts.sidebar')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
@yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')



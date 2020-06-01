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
  <div class="p-3" style="text-align:center">
  <h1 style="color:#5ac88b"><strong>Admin</strong></h1>
  </div>
  <div class="mx-auto text-center ">
       <img class="mx-auto" style="width: 500px; opacity: .9;" src="/design/AdminLTE/dist/img/circle-cropped (1).png">
    </div>
@yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')





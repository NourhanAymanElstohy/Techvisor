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
  </div>
  <div class="p-3" style="text-align:center">
  </div>
  <div class="mx-auto text-center ">
       <img class="mx-auto" style="width: 500px;" src="/design/AdminLTE/dist/img/circle-cropped (1).png">
    </div>
@yield('content')
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')





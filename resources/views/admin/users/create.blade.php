
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
<div class="container">
<div class="p-3" style="text-align:center">
    <form method="POST" action="{{route('users.store')}}">
        @csrf
        <h1 style="color:#3cb371"><strong>Create New User</strong></h1>
        <div class="form-group ">
            <label >Name</label>
            <input name="name" type="text" required class="form-control">
        </div>

        <div class="form-group mt-5">
            <label >Email</label>
            <input name="email" type="text" required class="form-control">
        </div>

        <div class="form-group mt-5">
            <label >Password</label>
            <input name="password" type="password" required class="form-control">
        </div>

        <div class="form-group mt-5">
            <label >Role</label>
            <select  class="form-control"  name="role">
            @foreach ($roles as $key => $value)
               <option value="{{ $value}}">{{$value}}</option>
            @endforeach
            </select>
            </div>
        <div class="justify-content-end">
           <input type="submit" value="Create" class="btn btn-success">
           </div>


        </div>

    </form>
     
</div>

  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')






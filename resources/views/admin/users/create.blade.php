
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

  @section('content')
<div class="container col-6">
    <form method="POST" action="{{route('admin.users.store')}}" class="mb-4">
        @csrf
        <h1 class="mt-5 text-center">Create New User</h1>
        <div class="form-group mt-5">
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
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')



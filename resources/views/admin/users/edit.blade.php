
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
  <h1 style="color:#3cb371"><strong>{{$user->name}}</strong></h1>
  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

    <form method="POST" action="{{route('users.update',$user->id)}}" class="mb-4">
        @csrf
        @method('PUT')
        <h1 class="mt-5 text-center">Edit {{$user->name}}</h1>
        <div class="form-group mt-5">
            <label >Name</label>
            <input name="name" type="text"  class="form-control" value="{{$user->name}}">
        </div>

        <div class="form-group mt-5">
            <label >Email</label>
            <input name="email" type="text"  class="form-control" value="{{$user->email}}">
        </div>
      

        <div class="form-group mt-5">
            <label >Role</label>
            <select  class="form-control"  name="role">
            @foreach ($roles as $key => $value)
            @if ($user->hasRole($value))
               <option value="{{ $value}}" selected>{{$value}}</option>
               @else
               <option value="{{ $value}}">{{$value}}</option>
            @endif   
            @endforeach
            </select>
            </div>
        <div class="justify-content-end">
           <input type="submit" value="Submit" class="btn btn-success">
           </div>


        </div>

    </form>
     
</div>

  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')





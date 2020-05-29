@hasrole('super-admin')

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

<div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
          <p class="card-text">{{$user->email}}</p>

        </div>
      </div>

</div>   </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')



  @else
  @extends('layouts.app')
  @section('content')
  <table id="example" class="table table-striped table-bordered" style="width:80rem%">
        <thead>
            <tr>
                <th>Name</th>
                <th>email</th>
                <th>status</th>
                <th>ChangeStatus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if($user->status=='online')
                  <td>Online</td>
                 @elseif($user->status=='offline')
                 <td>Offline</td>  
                  @endif  
                <td><a href="{{route('professionals.edit')}}" class="btn btn-primary">change</a></td>
   
                  
            </tr>
            </tbody>
    </table>
    @endsection
    @endhasrole

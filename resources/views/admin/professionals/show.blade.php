{{-- @include('admin.layouts.header')

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


  <table  class="table table-striped table-bordered" style="width:80rem%">
  <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                <th>status</th>
                <th>Banned At</th>
                <th>Situation</th>
            </tr>
            </thead> 
        <tbody>
        <tr>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->roles->implode('name', ',')}}</td>
        @if($user->status==1)
          <td>Active</td>
        @elseif($user->status==0)
          <td>Inactive</td>  
        @endif 
        <td>{{ $user->banned_at }}</td>
        <td>
          @if ($user->isNotBanned())                
        <a  href="{{ route('users.banned',['user'=>$user->id]) }}" class="btn btn-dark mr-2">Ban</a>
          @else
        <a  href="{{ route('users.banned',['user'=>$user->id]) }}" class="btn btn-success mr-2">Unban</a>
          @endif
        </td>
        </tr> 
        </tbody>
    </table>

</div>   </div>
</div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')



 --}}

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
  @if($role==1)
      <h1 style="color:#3cb371"><strong>Users</strong></h1>
      <div class="p-2">
          <a href="{{route('users.create')}}"><button type="button"
            class="btn btn-success float-left">Create User</button></a>
      </div> 
  @elseif ($role==3)
  <h1 style="color:#3cb371"><strong>Admins</strong></h1>
      <div class="p-2">
          <a href="{{route('users.create')}}"><button type="button"
            class="btn btn-success float-left">Create User</button></a>
      </div>
  @else 
      <h1 style="color:#3cb371"><strong>All Users</strong></h1>
      <div class="p-2">
          <a href="{{route('users.create')}}"><button type="button"
            class="btn btn-success float-left">Create User</button></a>
      </div> 
  @endif         
    
    <table id="example" class="table table-striped table-bordered" style="width:80rem%">
    <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Image</th>
       <th>Email</th>
       <th>Role</th>
       <th>Status</th>
       @if ($role==1)
       <th>Banned At</th>
       @endif
       <th>Actions</th>
     </tr>
     </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
    <th>{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td><img src="/uploads/avatars/{{$user->avatar}}" class="mx-auto" style="width: 60px;"></td>
    <td>{{$user->email}}</td>
    <td>{{$user->roles->implode('name', ',')}}</td>

    @if($user->status==1)
        <td>Active</td>
    @elseif($user->status==0)
        <td>Inactive</td>  
    @endif 
    @if ($role==1)
        <td>{{ $user->banned_at }}</td>
    @endif    
    
   <td>
   @if ($role==3 ||$role==0)
    <a href="{{route('user.show', $user->id)}}"><button type="button"
    class="btn btn-info float-center mr-2">Show</button></a>
   @else
   <a href="{{route('user.show', $user->id)}}"><button type="button"
    class="btn btn-info float-left mr-2">Show</button></a>
    @endif
    @if ($role==1)
    <a href="{{route('users.edit', $user->id)}}"><button type="button"
    class="btn btn-primary float-left mr-2">Edit</button></a>

    <form action="{{route('users.destroy', $user->id) }}" method="POST"
    class="float-left mr-2"> 
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger mr-2" onclick="return confirm ('are you sure?')">Delete</button>
    </form>
    @endif
  
    @if ($user->role==1 || $user->role==2)  
    @if ($role==1)             
        @if ($user->isNotBanned())                
        <a  href="{{ route('users.banned',['user'=>$user->id]) }}"
        class="btn btn-dark float-left mr-2">Ban</a>
        @else
        <a  href="{{ route('users.banned',['user'=>$user->id]) }}"
        class="btn btn-success float-left mr-2">Unban</a>
        @endif
        @endif
        @endif
    
    </td>
    </tr>
    @endforeach

    </tbody>
         </table>
         
    </div>
    </div>
    </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')
       





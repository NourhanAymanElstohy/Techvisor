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
        <h1 style="color:#3cb371"><strong>Professionals</strong></h1>

    
    <table id="example" class="table table-striped table-bordered" style="width:80rem%">
    <thead>
      <tr>
       <th>ID</th>
       <th>Name</th>
       <th>Email</th>
       <th>Roles</th>
       <th>Status</th>
       <th>Banned At</th>
       <th>Actions</th>
     </tr>
     </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
    <th>{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->roles->implode('name', ',')}}</td>
    @if($user->status=='online')
        <td>Active</td>
    @elseif($user->status=='offline')
        <td>Inactive</td>  
    @endif 
    <td>{{ $user->banned_at }}</td>
   <td>
    <a href="{{route('professional.show', $user->id)}}"><button type="button"
    class="btn btn-info float-left mr-2">Show</button></a>
                                            
    <a href="{{route('users.edit', $user->id)}}"><button type="button"
    class="btn btn-primary float-left mr-2  ">Edit</button></a>
                                             
    <form action="{{route('users.destroy', $user->id) }}" method="POST"
    class="float-right">
    @csrf
    {{ method_field('DELETE') }}
    <button type="submit" class="btn btn-danger mr-2" onclick="return confirm ('are you sure?')">Delete</button>

    </form>
                                            
    @if ($user->isNotBanned())                
    <a  href="{{ route('users.banned',['user'=>$user->id]) }}"
     class="btn btn-dark">Ban</a>
    @else
    <a  href="{{ route('users.banned',['user'=>$user->id]) }}"
     class="btn btn-success ">Unban</a>
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



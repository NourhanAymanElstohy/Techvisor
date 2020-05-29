@role('super-admin')
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
            <div class="container">

                <div class="row justify-content-center">
                    @role('super-admin')
                    <div class="col-md-8">
                        <a href="{{route('admin.users.create')}}" class="btn btn-success mb-5 mt-5">Create New User</a>
                    </div>
                    @endrole

                    <div class="card">

                        <div class="card-header">Users</div>

                        <div class="card-body">

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Actions</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->roles->implode('name', ',')}}</td>
                                        <td>

                                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button"
                                                    class="btn btn-primary float-left mr-2">Edit</button></a>
                                            <form action="{{route('admin.users.destroy', $user->id) }}" method="POST"
                                                class="float-left mr-2">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-warning">Delete</button>
                                            </form>
                                            @if ($user->isNotBanned())                
                                                <a  href="{{ route('admin.users.banned',['user'=>$user->id]) }}" class="btn btn-danger mr-2"  >Ban</a>
                                            @else
                                            <a  href="{{ route('admin.users.banned',['user'=>$user->id]) }}" class="btn btn-primary mr-2" >Unban</a>
                                            @endif

                                        </td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  </div>
  <!-- /.content-wrapper -->
  @include('admin.layouts.footer')
  @endrole

  @hasrole('professional')
  @extends('layouts.app')
  @section('content')
  @foreach ($users as $user)
  <a href="{{route('professional.show')}}"><button type="button" class="btn btn-primary float-left">profile</button></a>
  @endforeach
  @endhasrole
  @endsection
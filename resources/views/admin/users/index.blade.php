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
                        <a href="{{route('admin.professional.index')}}"
                            class="btn btn-success mb-5 mt-5">Professionals</a>
                        <a href="{{route('admin.user.index')}}" class="btn btn-success mb-5 mt-5">Users</a>
                    </div>
                    @endrole

                    <div class="card">

                        <div class="card-header">Users</div>


                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roles</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Banned At</th>
                                        <th scope="col" class="text-center" colspan="3">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
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
                                            <a href="{{route('admin.users.edit', $user->id)}}"><button type="button"
                                                    class="btn btn-primary float-left mr-2">Edit</button></a>
                                            
                                            <form action="{{route('admin.users.destroy', $user->id) }}" method="POST"
                                                class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-warning mr-2">Delete</button>
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
    <!-- /.content-wrapper -->

    @include('admin.layouts.footer')

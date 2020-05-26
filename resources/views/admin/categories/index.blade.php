
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
  <div class="container col-8">
    <div class="align-items-center mb-2 mt-2">
      <a href="{{route('categories.create')}}" class="btn btn-success btn-sm ">Create New Category</a>
    </div>


    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">created At</th> 
          {{-- <th scope="col">Created By</th> --}}
          <th scope="col" colspan="2">Actions</th>
        </tr>
      </thead>
    <tbody>
    @foreach ($categories as $category)
      <tr>
        <th scope="row">{{$category->id}}</th>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at->format('d-m-Y')}}</td>  
        {{-- <td>Admin: {{$category->user ? $category->user->role :'not exist!'}}</td> --}}
      
          <td>
            <div class="row">
              <a href="{{route('categories.edit',['category' => $category->id])}}" class="btn btn-success btn-sm mr-2">Edit</a>
              <form method="POST" action="{{route('categories.destroy',['category' => $category->id])}}">
                @csrf  
                @method('DELETE')
                <button class="btn btn-secondary btn-sm " onclick="return confirm ('are you sure?')">Delete</button>
              </form>
            </div>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>

{{-- @else
  <div class="container">
    <div class="mt-5" style="display: flex; width: 100%; align-items: stretch;">
      <nav id="sidebar">
        <div class="sidebar-header">
              <h3>IT Categories</h3>
          </div>

          <ul class="list-unstyled components">
              <li class="active">
              @foreach ($categories as $category)
              <li>
                  <a href="{{route('categories.show',['category' => $category->id])}}">{{$category->name}}</a>
              </li>
              @endforeach
          </ul>
      </nav>

    </div>
  </div>
  @endif --}}  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')




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
  @include('admin.layouts.footer')



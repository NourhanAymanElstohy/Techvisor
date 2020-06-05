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
    <h1 style="color:#3cb371"><strong>Categories</strong></h1>
    <div class="p-2">
       <a href="{{route('categories.create')}}"><button type="button"
        class="btn btn-success float-left">Create Categorie</button></a>
        </div>
        


    <table id="example" class="table table-striped table-bordered" style="width:80rem%">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>created At</th> 
          <th>Created By</th>
          <th>Actions</th>
        </tr>
      </thead>
    <tbody>
    @foreach ($categories as $category)
      <tr>
        <th>{{$category->id}}</th>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at ? $category->created_at->format('d-m-Y') : ''}}</td>  
        <td>Admin: {{$user->name}}</td>
      
          <td> 
              <a href="{{route('categories.edit',['category' => $category->id])}}"
               class="btn btn-primary float-center mr-2">Edit</a>
               <a href="{{route('categories.show',['category' => $category->id])}}"
               class="btn btn-info float-left mr-2">Show</a>
              <form method="POST" action="{{route('categories.destroy',['category' => $category->id])}}"
              class="float-right">
                @csrf  
                @method('DELETE')
                <button class="btn btn-danger mr-2" onclick="return confirm ('are you sure?')">Delete</button>
              </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>
    <!-- /.content-wrapper -->
    @include('admin.layouts.footer')




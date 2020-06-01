
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
  <h1 style="color:#3cb371"><strong>{{$category->name}}</strong></h1>
      <form method="POST" action="{{route('categories.update',['category'=>$category->id])}}" class="mb-4">
        @csrf
        @method('PUT')
        <h1 class="mt-5 text-center">Edit Category</h1>
        <div class="form-group mt-5">
            <label>Name</label>
        <input name="name" type="text" class="form-control" aria-describedby="emailHelp" value="{{$category->name}}">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
      @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')



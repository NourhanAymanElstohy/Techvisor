
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
  <div class="container col-6">
    <form method="POST" action="{{route('categories.store')}}" class="mb-4">
        @csrf
        <h1 class="mt-5 text-center">Create New Category</h1>
        <div class="form-group mt-5">
            <label >Name</label>
            <input name="name" type="text" class="form-control" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
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
</div>
  </div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')



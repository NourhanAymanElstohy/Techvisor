
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
    <form method="POST" action="{{route('categories.store')}}" class="mb-4">
        @csrf
        <h1 style="color:#3cb371"><strong>Create New categorie</strong></h1>
        <div class="form-group mt-5">
            <label >Name</label>
            <input name="name" type="text" class="form-control" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-success">Create</button>
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



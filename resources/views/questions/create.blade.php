
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
  <div class="container">
  <div class="p-3" style="text-align:center">
    <form method="POST" action="{{route('questions.store')}}">
      @csrf
      <h1 style="color:#3cb371"><strong>Create New Question</strong></h1>
      <div class="form-group mt-5">
        @if ($prof)
            <input type="hidden" class="form-control" name="prof" value="{{$prof}}">
        @else
        <div class="form-group mt-5">
    <label for="exampleFormControlSelect1">Users</label>
    <select name="prof" class="form-control ">
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select> 
      </div>

        @endif
            <label for="exampleFormControlTextarea1">Ask Your Question</label>
            <textarea class="form-control" name="question" rows="3"></textarea>
        </div>
        <div class="form-group mt-5">
        <label for="exampleFormControlSelect1">State</label>
        <select name="state" class="form-control ">
            
              <option value="public">public</option>
              <option value="private">private</option>
          
            </select>
      </div>

      <button type="submit" class="btn btn-success">Create</button>
      
    </form>  
</div>
  </div>
</div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')


@else
@include('layouts.app')
  <div class="container">
  <div class="p-3" style="text-align:center">
    <form method="POST" action="{{route('questions.store')}}">
      @csrf
      <h1 style="color:#3cb371"><strong>Create New Question</strong></h1>
      <div class="form-group mt-5">
        @if ($prof)
            <input type="hidden" class="form-control" name="prof" value="{{$prof}}">
        @else
        <div class="form-group mt-5">
    <label for="exampleFormControlSelect1">Users</label>
    <select name="prof" class="form-control ">
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select> 
      </div>

        @endif
            <label for="exampleFormControlTextarea1">Ask Your Question</label>
            <textarea class="form-control" name="question" rows="3"></textarea>
        </div>
        <div class="form-group mt-5">
        <label for="exampleFormControlSelect1">State</label>
        <select name="state" class="form-control ">
            
              <option value="public">public</option>
              <option value="private">private</option>
          
            </select>
      </div>

      <button type="submit" class="btn btn-success">Create</button>
      
    </form>  
</div>
    <!-- /.content-wrapper -->
  @endrole










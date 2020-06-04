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

<div class="post-popup job_post">
        <div class="post-project">
            <h3>Post a Question</h3>
            <div class="post-project-fields">
                <form method="POST" action="{{route('questions.store')}}">
                  @csrf
                
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
                
                    <div class="row">
                        <div class="col-lg-12">
                            <textarea name="question" placeholder="Question" class="text-dark"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <ul>
                                <li><button class="active" type="submit" value="post">Post</button></li>
                                <li><a href="#" title="">Cancel</a></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <a href="#" title=""><i class="la la-times-circle-o"></i></a>
        </div>
    </div>
@endrole










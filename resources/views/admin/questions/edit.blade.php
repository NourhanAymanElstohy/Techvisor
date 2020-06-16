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
  <h1 style="color:#3cb371"><strong>Edit Qestion</strong></h1>

      <form method="POST" action="{{route('questions.update',['question'=>$question->id])}}">
        @csrf
        <div class="form-group">
    <label for="exampleFormControlSelect1">Users</label>
    <select name="prof" class="form-control " value="{{ $question->prof ? $question->prof->name : 'not exist'}}">
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
      </div>
      <div class="form-group mt-5 ">
      <label for="exampleFormControlSelect1">categories</label>
            <select name="cat" class="form-control" value="{{ $question->category ? $question->category->name : 'not exist'}}">
            
            @foreach($cats as $cat)  
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            </select> 
          </div>
          <div class="form-group"> 
              <label for="exampleFormControlTextarea1">Ask Your Question</label>
              <input type="hidden" class="form-control" name="id" value="{{$question->id}}">

              <textarea class="form-control" name="question" rows="3" >{{$question->question}}</textarea>
          </div>
          <div class="form-group">
          <label for="exampleFormControlSelect1">state</label>
          <select name="state" class="form-control " value="{{$question->state}}">
              
                <option value="public">public</option>
                <option value="private">private</option>
            
              </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif
      </form>  
</div>  </div>
</div>
  <!-- /.content-wrapper -->

  @include('admin.layouts.footer')



  
  @endrole
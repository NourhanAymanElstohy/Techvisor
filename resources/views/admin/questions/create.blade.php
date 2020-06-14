@include('admin.layouts.header')

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  @include('admin.layouts.navbar')
 
  @include('admin.layouts.sidebar')

  <div class="content-wrapper">
  <div class="container">
  <div class="p-3" style="text-align:center">
    <form method="POST" action="{{route('questions.store')}}">
      @csrf
      <h1 style="color:#3cb371"><strong>Create New Question</strong></h1>
      <div class="form-group mt-5">
        @if ($prof)
            <input type="hidden" class="form-control" name="prof" value="{{$prof}}">
            <input type="hidden" class="form-control" name="cat" value="{{$cat}}">
        @else
        <div class="form-group mt-5">
    <label for="exampleFormControlSelect1">Users</label>
    <select name="prof" class="form-control" value="">
    
        @foreach($users as $user)  
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select> 
      </div>
      <div class="form-group mt-5">
    <label for="exampleFormControlSelect1">categories</label>
    <select name="cat" class="form-control" value="">
    <option value=""></option>
        @foreach($cats as $cat)  
          <option value="{{$cat->id}}">{{$cat->name}}</option>
        @endforeach
        </select> 
      </div>


        @endif
            <label for="exampleFormControlTextarea1">Ask Your Question</label>
            <textarea class="form-control" name="question" rows="3"></textarea>
        </div>
        

      <button type="submit" class="btn btn-success">Create</button>
      
    </form>  
</div>
  </div>
</div>
@include('admin.layouts.footer')

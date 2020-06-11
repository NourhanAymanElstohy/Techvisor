
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
  <div class="p-3" style="text-align:left">
  <h1 style="color:#3cb371"><strong>{{$question->question}}</strong></h1></br>

  <div class="p-3">
        <img src="/uploads/avatars/{{$question->user->avatar}}" width="40" height="40" style="float:left">
        <h5 style="color:#3cb371"><strong>Name :  </strong><span style="color:black"><strong>{{ $question->user ? $question->user->name : 'not exist'}}</strong></span></h5></br>
        <img src="{{ url('design/style') }}/images/clock.png" width="20" height="20" style="float:left">
        <h5 style="color:#3cb371"><strong>Created At : </strong><span  style="color:black"><strong>{{$question->created_at}}</strong></span></h5>
  </div>


  <div class="p-3">
      <img src="{{ url('design/style') }}/images/icon8.png" width="20" height="20" style="float:left">
      <h5 style="color:#3cb371"><strong>Categorie :  </strong><span style="color:black"><strong>
              {{ $question->category ? $question->category->name : 'not exist'}}</strong></span></h5>   
  </div>

  <div class="p-3">
        <h5 style="color:#3cb371"><strong>Question :  </strong><span style="color:black"><strong>
      {{$question->question}}</strong></span></h5>
  </div>
 
                                       
                                        
                                          
<div class="p-3">
  @if($question->answers)
  <ul>
  @foreach($question->answers as $answer)
  <img src="{{ url('design/style') }}/images/icon9.png" width="20" height="20" style="float:left">
  <h5 style="color:#3cb371"><strong>AnswerBy {{$answer->user->name}} : </strong><span style="color:black"><strong> {{ $answer->answer}}
  </strong></span></h5></br>
  @endforeach
  </ul>
  @endif
  </div>

  <div class="p-3">                                                                               
  <form method="POST" action="{{route('answers.store')}}">   
  @csrf
                                        
  <input type="hidden" class="form-control" name="question_id" value="{{$question->id}}">
  <input type="text" class="form-control" name="answer">
  </br>

   <button type="submit" class="btn btn-success">Add Answer</button>
  </form>     
  </div>                                 
                                       
</div>
</div>
</div>
</div>
<!-- </div> -->
@include('admin.layouts.footer')



 


 

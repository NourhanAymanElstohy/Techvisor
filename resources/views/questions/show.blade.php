
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
  <h1 style="color:#3cb371"><strong>{{$question->question}}</strong></h1>

      <div class="card" style="width: 18rem;">
              <div class="card-body">
              <h5 class="card-title">{{$question->question}}</h5>
                <p class="card-text">user name:{{ $question->user ? $question->user->name : 'not exist'}}</p>
                <p class="card-text"><td>{{ $question->answer ? $question->answer->answer : ''}}</td></p>
                <p class="card-text">{{$question->state}}</p>
              </div>
            </div>
      </div> 
</div>
</div>
@include('admin.layouts.footer')
@endrole



@role('user')
@include('layouts.app')
  <div class="container">
  <div class="p-3" style="text-align:center">
  <h1 style="color:#3cb371"><strong>{{$question->question}}</strong></h1>

      <div class="card" style="width: 18rem;">
              <div class="card-body">
              <h5 class="card-title">{{$question->question}}</h5>
                <p class="card-text">user name:{{ $question->user ? $question->user->name : 'not exist'}}</p>
                <p class="card-text"><td>{{ $question->answer ? $question->answer->answer : ''}}</td></p>
                <p class="card-text">{{$question->state}}</p>
              </div>
            </div>
      </div> 
</div>
@endrole


 


 

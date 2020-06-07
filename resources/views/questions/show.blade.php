
@extends('layouts.app')
@section('content')
<div class="main-section">
  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper "> -->
  <div class="container" style="margin-bottom :600px">
  <div class="p-3" style="text-align:center">
 

      <div class="card mt-5 " >
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
<!-- </div> -->
@endsection
 


 

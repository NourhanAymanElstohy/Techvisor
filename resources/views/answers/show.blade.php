@extends('layouts.app')
@section('content')
<div class="container" style="margin-bottom :600px">
  <div class="p-3" style="text-align:center">
 

      <div class="card mt-5 " >
              <div class="card-body">
              <h5 class="card-title">{{$answer->question->question}}</h5>
                <p class="card-text">user name:{{ $answer->question->user ? $answer->question->user->name : 'not exist'}}</p>
                <p class="card-text"><td>{{$answer->user->name }} : {{$answer->answer}}</td></p>
              </div>
            </div>
      </div> 
      
</div>

@endsection
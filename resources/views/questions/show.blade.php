
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
      <div class="job-status-bar">
                                        <ul class="like-com">
                                        @if($question->answers)
                                         @foreach($question->answers as $answer)
                                            <li>{{$answer->user->name}}:{{ $answer->answer}}</li></br>
                                         @endforeach
                                         @endif   
                                         
                                        </ul>
      </div>
                                        <div class="job-status-bar">
                                                <ul class="like-com">
                                                <li>
                                                <form method="POST" action="{{route('answers.store')}}">   
                                                @csrf
                                                
                                                <input type="hidden" class="form-control" name="question_id" value="{{$question->id}}">
                                                <input type="text" class="form-control" name="answer">

                                                <button type="submit" class="btn btn-success">Create</button>
                                                </form>
                                                <li>
                                                </ul>
                                        </div>
                                    
                                </div>
</div>
</div>
<!-- </div> -->
@endsection
 


 

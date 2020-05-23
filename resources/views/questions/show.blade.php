@extends('admin.index')

@section('content')

<div class="card" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title">{{$question->question}}</h5>
          <p class="card-text">{{ $question->user ? $question->user->name : 'not exist'}}</p>
          <p class="card-text"><td>{{ $question->answer ? $question->answer->answer : ''}}</td></p>
          <p class="card-text">{{$question->state}}</p>

        </div>
      </div>

</div> 

@endsection     
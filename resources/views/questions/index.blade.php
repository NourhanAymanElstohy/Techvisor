@extends('admin.index')

@section('content')

<div class="x_content">
                        <section>
                        <h1> QUESTIONS</h1>
    <table class="table">
  <thead>

    <tr>
      <th scope="col">id</th>
      <th scope="col">question</th>
      <th scope="col">answer</th>
      <th scope="col">user</th>
      <th scope="col">state</th>
      <th scope="col">created_at</th>
      <th colspan="3" scope="col-3">actions</th>
    </tr>
  </thead>
  <a href="{{route('questions.create')}}" class="btn btn-primary">create question</a>
  <tbody>
  @foreach($questions as $question)
   
    <tr>
      
      
      <td>{{$question?$question->id:""}}</td>
      <td>{{$question?$question->question:""}}</td>
      <td>{{ $question->answer ? $question->answer->answer : 'not exist'}}</td>
      <td>{{ $question->user ? $question->user->name : 'not exist'}}</td>
      <td>{{$question?$question->state:""}}</td>
      <td>{{$question?$question->created_at:""}}</td>
     
      
      <td><a href="{{route('questions.show',['question'=> $question->id])}}" class="btn btn-primary">view</a></td>
      
             
      @endforeach
    </tr>

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
      
     
       
      </div>
    </div>
   
  </div>
</div>
   
  </tbody>
</table>
                        </section>
                    </div>


@endsection
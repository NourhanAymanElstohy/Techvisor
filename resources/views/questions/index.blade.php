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
      <td><a href="{{route('questions.edit',['question'=> $question->id])}}" class="btn btn-secondary">update</a></td>
      <td><a class="btn btn-danger" href="#" role="button" data-toggle="modal" data-target="#delete-modal-{{$question->id}}">Delete</a></td>
      <div class="modal fade" id="delete-modal-{{$question->id}}" tobindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <form method="POST"  action="{{route('questions.destroy',$question->id)}}">
                      @csrf
                      @method('DELETE')
                      <div class="modal-header">
                        <h5 class="modal-title">Delete question #{{$question->id}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Click delete to delete the question!
                        
                      </div>
                      <div class="modal-body">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>

                      </div>

                    </form>
                    </div>
                  </div>
              </div>
             
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
      
      <a href="{{route('questions.destroy',['question'=> $question->id])}}" class="btn btn-warning">yes</a>
      <a href="{{route('questions.index')}}" class="btn btn-warning">no</a>
       
      </div>
    </div>
   
  </div>
</div>
   
  </tbody>
</table>
                        </section>
                    </div>


@endsection
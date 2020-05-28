@role('super-admin')

      @extends('admin.index')

      @section('content')
      <form method="POST" action="{{route('questions.update',['question'=>$question->id])}}">
        @csrf
          <div class="form-group">
              <label for="exampleFormControlTextarea1">ASK YOUR QUESTION</label>
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

        <button type="submit" class="btn btn-primary">Submit</button>
        
      </form>  


      @endsection    
@endrole
@role('user')
<form method="POST" action="{{route('questions.update',['question'=>$question->id])}}">
        @csrf
          <div class="form-group">
              <label for="exampleFormControlTextarea1">ASK YOUR QUESTION</label>
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

        <button type="submit" class="btn btn-primary">Submit</button>
        
      </form>  
@endrole      
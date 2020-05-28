@role('super-admin')
    @extends('admin.index')

    @section('content')
    <form method="POST" action="{{route('questions.store')}}">
      @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">ASK YOUR QUESTION</label>
            <textarea class="form-control" name="question" rows="3"></textarea>
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">state</label>
        <select name="state" class="form-control ">
            
              <option value="public">public</option>
              <option value="private">private</option>
          
            </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      
    </form>  


    @endsection    
@endrole



@role('user')
  <form method="POST" action="{{route('questions.store')}}">
      @csrf
        <div class="form-group">
            <label for="exampleFormControlTextarea1">ASK YOUR QUESTION</label>
            <textarea class="form-control" name="question" rows="3"></textarea>
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">state</label>
        <select name="state" class="form-control ">
            
              <option value="public">public</option>
              <option value="private">private</option>
          
            </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
      
    </form> 
@endrole
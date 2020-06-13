<div class="post-bar">
<div class="post_topbar">
<div class="job_descp">
<div class="main-section" style="z-index:1">
<div class="container">
  <div class="p-3" style="text-align:center" >
    <form method="POST" action="{{route('questions.store')}}">
      @csrf
      <h1 style="color: #E44E3A; font-size:30px;"><strong>Create New Question</strong></h1>
      <div class="form-group mt-5 ">
        @if ($prof)
            <input type="hidden" class="form-control" name="prof" value="{{$prof}}">
            <input type="hidden" class="form-control" name="cat" value="{{$cat}}">
        @else
        <label for="exampleFormControlSelect1">categories</label>
            <select name="cat" class="form-control" value="">
            @foreach($cats as $cat)  
            <option value="{{$cat->id}}">{{$cat->name}}</option>
            @endforeach
            </select> 
          </div>
        @endif

            <label for="exampleFormControlTextarea1" style="color: #E44E3A;">Ask a Question</label>
            <textarea class="form-control" name="question" rows="3" required></textarea>
            <div class="form-group mt-5">
            
            </div>
            

      <button type="submit" class="btn " style="background-color: #E44E3A;">Create</button>
      
    </form>  
</div>
</div>
</div>
</div>
</div>








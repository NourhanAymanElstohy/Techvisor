@extends('layouts.app')
@section('content')

<div class="wrapper">
      
      <main>
          <div class="main-section">
              <div class="container">
                  <div class="main-section-data">

            <div class="company-title">
                <h3>All Professional On This Category</h3>
            </div>

            <div class="companies-list">
				<div class="row">
            @if(count($category->profs) > 0)        
                @foreach($category->profs as $prof) 
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                            <img src="/uploads/avatars/{{$prof->avatar}}" alt="">
                                <h3>{{$prof->name}}</h3>
                                <ul>
                                    <li><a class="active follow" href="{{route('questions.create',['prof'=> $prof->id])}}" title="">ASK</a></li>  
                                    <li><a href="/zoom/{{$prof->id}}" title="" id="zoom" class="hire" onclick="return connectZoom();">Zoom</a></li>
                                    <li id="demo"></li>
                                    <input type="hidden" name="create" value="" id="create-zoom">
                                </ul>
                                
                            </div>
                            <a href="{{route('professional.show',['professional' => $prof->id])}}" title="" class="view-more-pro">View Profile</a>
                        </div>
                    </div>
 
                @endforeach
            @endif
 
     
    </div>
            </div>

    </div>
    </div>
    </div>
    </main>
<script>
    function connectZoom() {
        document.getElementById("create-zoom").value = "{{ $meeting = Zoom::user()->find('nourhanelstohy@gmail.com')->meetings()->create(['topic' => $category->name])}}";
        document.getElementById("demo").innerHTML = "<a href=\"{{$meeting->join_url}}\" target=\"_blank\" class=\"btn btn-primary\">Join Url</a>"
        document.querySelector("#zoom").style.display ="none"
    }
</script>
@endsection
	
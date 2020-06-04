
@extends('layouts.app')
@section('content')

<div class="wrapper">
      
      <section class="cover-sec">
          <img src="{{ url('design/style') }}/images/resources/cover-img.jpg" alt="">
      </section>


      <main>
          <div class="main-section">
              <div class="container">
                  <div class="main-section-data">

<div class="container m-5">
    <div class="row">
    @foreach($profs as $prof) 
        <div class="col-3">
            <div class="card ">
                <div class="card-header text-center bg-primary text-light">
                    <a href="{{route('professional.show',['professional' => $prof->id])}}" class="text-light">{{$prof->name}}</a>
                </div>
                <div class="card-body">
                    <a href="{{route('questions.createprof',['prof'=> $prof->id])}}" class="btn btn-primary btn-sm">ask</a>
                    <a href="/zoom/{{$prof->id}}" class="btn btn-primary btn-sm">zoom</a>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</div>  
</main>
</div>  

@endsection --}}


@extends('layouts.app')
@section('content')
		
    <section class="companies-info">
        <div class="container">
            <div class="company-title">
                <h3>All Professional On This Category</h3>
            </div>
            <div class="companies-list">
				<div class="row">

                    {{-- Professional data --}}
                @foreach($profs as $prof)     
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="company_profile_info">
                            <div class="company-up-info">
                            <img src="{{ url('design/style') }}/images/resources/user2.png" alt="">
                                <h3>{{$prof->name}}</h3>
                                <ul>
                                    <li><a class="post-jb active follow" href="{{route('questions.create',['prof'=> $prof->id])}}" title="">ASK</a></li>  
                                    <li><a href="#" title="" class="hire">Zoom</a></li>
                                </ul>
                            </div>
                            <a href="{{route('professional.show',['prof' => $prof->id])}}" title="" class="view-more-pro">View Profile</a>
                        </div>
                    </div>
                @endforeach
                
                </div>
            </div>
        </div>
    </section><!--companies-info end-->
	@include('questions.create')

@endsection
	
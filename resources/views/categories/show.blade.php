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
                            <h1>hello</h1>
                            <a href="{{route('professional.show',['professional' => $prof->id])}}" title="" class="view-more-pro">View Profile</a>
                        </div>
                    </div>
                @endforeach
                
                </div>
            </div>
        </div>
    </section><!--companies-info end-->

	@include('questions.create')

@endsection
	
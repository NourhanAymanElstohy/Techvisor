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

                    <div class="companies-list" style="margin-bottom: 318px">
                        <div class="row">
                            @if(count($category->profs) > 0)
                                @foreach($category->profs as $prof)
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="company_profile_info">
                                        <div class="company-up-info">
                                            <img src="/uploads/avatars/{{$prof->avatar}}" alt="">
                                            <h3>{{$prof->name}}</h3>
                                            @if($prof->status == 1)
                                                <h3 class="d-inline">Status: </h3><h3 class="text-secondary d-inline">Offline</h3>
                                            @else 
                                                <h3 class="d-inline">Status: </h3><h3 class="text-success d-inline">Online</h3>
                                            @endif
                                            
                                            <h3 class="text-capitalize text-info mt-2">{{$prof->state}}</h3>
                                            @if ($prof->id != Auth::user()->id)
                                                    <ul>
                                                @if($prof->status == 1)
                                                    
                                                        <li><a class="active follow"
                                                                href="{{route('questions.create',['prof'=> $prof->id,'cat'=>$category->id])}}"
                                                                title="">ASK</a></li>
                                                @else
                                                        <li><a class="active follow"
                                                                href="{{route('questions.create',['prof'=> $prof->id,'cat'=>$category->id])}}"
                                                                title="">ASK</a></li>            
                                                        @if ($prof->state == 'premium')
  
                                                            <form method="POST" action="{{ route('pay')}}" class="d-inline">
                                                                {{ csrf_field() }}
                                                                <input   type="hidden" name="price" value='1'/>
                                                                <input type="hidden" name="name" value="{{$prof->name}}" />
                                                                <input type="hidden" name="id" value="{{$prof->id}}" />
                                                                <button class="btn hire text-light" type="submit">Zoom</button>
                                                            </form><br/>
                                                            
                                                        @else
                                                            <li><a href="/zoom/{{$prof->id}}" class="hire" >Zoom</a></li>

                                                        @endif
            
                                                @endif
                                                    </ul>
                                                
                                        @endif

                                    </div>
                                    <a href="{{route('professional.show',['professional' => $prof->id])}}" title=""
                                        class="view-more-pro">View Profile</a>
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

    @endsection

@extends('layouts.app')
@section('content')


<div class="search-sec">
    <div class="container">
        <div class="search-box">
            <form method="GET" action="/search">
                <input type="text" name="search" class="text-dark" placeholder="Search keywords">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<main>
    <div class="main-section">
        <div class="container">
            <div class="main-section-data">
                <div class="row">

                    @include('categories.index')

                    <div class="col-lg-6 col-md-8 no-pd">
                        <div class="main-ws-sec">
                            {{-- @auth --}}
                            <div class="post-topbar">
                                <div class="user-picy">
                                    {{-- <img src="images/resources/user-pic.png" alt=""> --}}
                                </div>
                                <div class="post-st">
                                    <ul>
                                        <li><a class="active" href="{{route('questions.create')}}" title="">Post a Public Question</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="posts-section">
                                @include('questions.index')
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">

                            @guest
                                <div class="widget widget-about"> 
                                <img src="{{ url('design/style') }}/images/logo2.jpeg"  width="200" height="80"alt="">
                                    <div class="sign_link">
                                        <h3><a href="{{ route('login') }}">{{ __('Login') }} </a></h3>
                                    </div>
                                </div>
                            @endguest
                            <div class="widget widget-jobs m-0">
                                <div class="sd-title">
                                    <h4>Top Professionals With Rate</h4>
                                </div>
                                @foreach($professionals as $professional)
                                <div class="jobs-list ">
                                    <div class="job-info">
                                        <div class="job-details">
                                            <div class="usy-dt">
                                                <img src="/uploads/avatars/{{$professional->avatar}}" width="30" height="30" alt="" style="padding: 0px;">
                                            </div>
                                            <div class="usy-name mt-1">
                                                <p ><a href="professionals/{{$professional->id}}" class="text-capitalize" style="color: #e44d3a;"> {{$professional->name}}</a></p>
                                            </div>
                                        </div>
                                        <div class="hr-rate mt-2" >
                                            <span style="color:#0e5b44;"> {{number_format($professional->rating_average,1)}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<div class="post-popup job_post">
    <div class="post-project">
        <h3>Post a Question</h3>
        <div class="post-project-fields">
            <form>
                <div class="row">
                    <div class="col-lg-12">
                        <textarea name="question" placeholder="Question"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <ul>
                            <li><button class="active" type="submit" value="post">Post</button></li>
                            <li><a href="#" title="">Cancel</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
</div>

@endsection

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
                            {{-- @endauth --}}
                            <div class="posts-section">                       
                                @include('questions.index')  
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">

                            @guest
                            <div class="widget widget-about"> 
                            <h1 class="font-weight-bold text-capitalize mt-3" style="font-family: 'Serif', cursive; font-size:40px; color: #E44E3A">Techvisor</h1>
                                {{-- <img src="{{ url('design/style') }}/images/wd-logo.png" alt=""> --}}
                                {{-- <h3>IT Workwise</h3> --}}
                                <div class="sign_link">
                                    <h3><a href="{{ route('login') }}">{{ __('Login') }} </a></h3>
                                </div>
                            </div>
                            @endguest
                            
                            <!--widget-about end-->
                            <div class="widget widget-jobs">
                                <div class="sd-title">
                                    <h3>Top Professionals With Rate</h3>
                                    <!--i class="la la-ellipsis-v"></i-->
                                </div>
                                <div class="jobs-list">
                                    <div class="job-info">
                                        <div class="job-details">
                                            {{-- <h3>Senior Product Designer</h3> --}}
                                            <p></p>
                                        </div>
                                        <div class="hr-rate">
                                            {{-- <span>$25/hr</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <!--jobs-list end-->
                            </div>
                            <!--widget-jobs end-->


                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>






</div>
<!--theme-layout end-->
<!-- add the post Q -->

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
        <!--post-project-fields end-->
        <a href="#" title=""><i class="la la-times-circle-o"></i></a>
    </div>
    <!--post-project end-->
</div>
<!--post-project-popup end-->

@endsection

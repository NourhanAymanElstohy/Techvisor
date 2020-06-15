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
                           
                            <div class="posts-section">
                                    @if($flag=='create')
                                        @include('questions.create')  
                                    @elseif($flag =='edit')   
                                        @include('questions.edit')
                                    @elseif($flag =='show')   
                                       @include('questions.show')  
                                    @else
                                       @include('answers.show')    
                                    @endif            
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">

                            @guest
                            <div class="widget widget-about"> 
                            <img src="{{ url('design/style') }}/images/logo3.jpeg"  width="200" height="150"alt="">
                                {{-- <img src="{{ url('design/style') }}/images/wd-logo.png" alt=""> --}}
                                {{-- <h3>IT Workwise</h3> --}}
                                <div class="sign_link">
                                    <h3><a href="{{ route('login') }}">{{ __('Login') }} </a></h3>
                                </div>
                            </div>
                            @endguest
                        </div>
                        <!--right-sidebar end-->
                    </div>
                </div>
            </div><!-- main-section-data end-->
        </div>
    </div>
</main>

</div>


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

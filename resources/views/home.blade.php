@extends('layouts.app')
@section('content')


<div class="search-sec">
    <div class="container">
        <div class="search-box">
            <form>
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
                            @auth
                            <div class="post-topbar">
                                <div class="user-picy">
                                    {{-- <img src="images/resources/user-pic.png" alt=""> --}}
                                </div>
                                <div class="post-st">
                                    <ul>
                                        <li><a class="post-jb active" href="#" title="">Post a Public Question</a></li>
                                    </ul>
                                </div>
                            </div>
                            @endauth
                            <div class="posts-section">
                                <div class="top-profiles">
                                    <div class="pf-hd">
                                        <h3>Top Professionals Rates</h3>
                                        <!--i class="la la-ellipsis-v"></i-->
                                    </div>
                                    <div class="profiles-slider">

                                        <!--- top professionals by rate -->
                                        <div class="user-profy">
                                            <img src="{{ url('design/style') }}/images/resources/user1.png" alt="">
                                            <h3>John Doe</h3>
                                            <span>Graphic Designer</span>
                                            <ul>
                                                <li><a href="#" title="" class="post-jb active follow">ASK</a></li>

                                                <li><a href="#" title="" class="hire">ZOOM</a></li>
                                            </ul>
                                            <a href="/style/profile" title="">View Profile</a>
                                        </div>
                                        
                                    </div>
                                    <!--profiles-slider end-->
                                </div>
                                <!--top-profiles end-->

                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="{{ url('design/style') }}/images/resources/us-pic.png" alt="">
                                            <div class="usy-name">
                                                <h3>John Doe</h3>
                                                <span><img src="{{ url('design/style') }}/images/clock.png" alt="">3 min
                                                    ago</span>
                                            </div>
                                        </div>
                                        <div class="ed-opts">
                                            <a href="#" title="" class="ed-opts-open"><i
                                                    class="la la-ellipsis-v"></i></a>
                                            <ul class="ed-options">
                                                <li><a href="#" title="">Edit Post</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="epi-sec">
                                        <ul class="descp">
                                            <li><img src="{{ url('design/style') }}/images/icon8.png" alt=""><span>
                                                    Category Name</span></li>
                                            <li><img src="{{ url('design/style') }}/images/icon9.png"
                                                    alt=""><span>Question</span></li>
                                        </ul>
                                        
                                    </div>
                                    <div class="job_descp">
                                       
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus
                                            hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet...
                                          
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                       
                                            <li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Answers
                                                    </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 pd-right-none no-pd">
                        <div class="right-sidebar">

                            @guest
                            <div class="widget widget-about">
                                <img src="{{ url('design/style') }}/images/wd-logo.png" alt="">
                                <h3>IT Workwise</h3>
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
                                            <h3>Senior Product Designer</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
                                        </div>
                                        <div class="hr-rate">
                                            <span>$25/hr</span>
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

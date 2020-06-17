@extends('layouts.app2')
@section('content')


<div class="wrapper">

      <section class="cover-sec">
          <img src="{{ url('design/style') }}/images/cover.jpg" style="height: 300px;" alt="">
      </section>

      <main>
          <div class="main-section">
              <div class="container">
                  <div class="main-section-data">
                      <div class="row">

                          <div class="col-lg-3">
                              <div class="main-left-sidebar">
                                  <div class="user_profile">
                                      <div class="user-pro-img">
                                          <img src="/uploads/avatars/{{$user->avatar}}" alt="">
                                      </div>
                                      <div class="user_pro_status">
                                        @if ($user->id == Auth::user()->id)  
                                          <ul class="flw-hr">
                                              <li><a href="{{route('professionals.edit', $user->id)}}" title="" class="flww">Edit Profile</a></li>
                                          </ul>
                                        @endif  
                                          <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $user->averageRating }}" data-size="xs" disabled="">
                                      </div>
                                      <ul class="social_links">
                                         <li><a href="#" title=""><i class="la la-envelope" style="font-size:20px;color: #99ccff"></i>{{$user->email}}</a></li>

                                   @if ( $user->linkedin != null )
                                        <li><a href="#" title=""><i class="fa fa-linkedin" style="font-size:20px;color:#4d88ff"></i>{{$user->linkedin}}</a></li>
                                    @endif
                                    @if ($user->github != null)
                                        <li><a href="#" title=""><i class="fa fa-github" style="font-size:20px;color:red"></i>{{$user->github}}</a></li>
                                    @endif
                                    @if ($user->other != null)
                                       <li><a href="#" title=""><i class="la la-globe" style="font-size:20px;color:#004d99"></i>{{$user->other}}</a></li>
                                   @endif
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="main-ws-sec">
                                  <div class="user-tab-sec">
                                      <h3>{{$user->name}}</h3>
                                      <div class="star-descp">
                                      </div>
                                      <div class="tab-feed">
                                          <ul>
                                              <li data-tab="feed-dd" class="active">
                                                  <a href="#" title="">
                                                      <img src="{{ url('design/style') }}/images/ic1.png" alt="">
                                                      <span>Feed</span>
                                                  </a>
                                              </li>

                                          </ul>
                                      </div>
                                  </div>                               
                                  <div class="product-feed-tab current" id="feed-dd">

                                      @include('questions.index2')

                                  </div>
                                </div>
                          </div>
                          @include('categories.index2')
                      </div>
                  </div>
              </div>
          </div>
      </main>


@endsection



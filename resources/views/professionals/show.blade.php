@extends('layouts.app2')
@section('content')


<div class="wrapper">

      <section class="cover-sec">
          <img src="{{ url('design/style') }}/images/resources/code-wallpaper-10.jpg" style="height: 200px;" alt="">
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
                                          <ul class="flw-hr">
                                              <li><a href="{{route('professionals.edit', $user->id)}}" title="" class="flww">Edit Profile</a></li>
                                          </ul>
                                          <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $user->rating_average }}" data-size="xs" disabled="">
{{--                                          <h3>Rated By: {{$rateCount ??''}} users</h3>--}}
                                      </div><!--user_pro_status end-->
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
                                  </div><!--user_profile end-->


                              </div><!--main-left-sidebar end-->

                          </div>
                          <div class="col-lg-6">
                              <div class="main-ws-sec">
                                  <div class="user-tab-sec">
                                      <h3>{{$user->name}}</h3>
                                      <div class="star-descp">
{{--                                          <ul>--}}
{{--                                              <li><i class="fa fa-star"></i></li>--}}
{{--                                              <li><i class="fa fa-star"></i></li>--}}
{{--                                              <li><i class="fa fa-star"></i></li>--}}
{{--                                              <li><i class="fa fa-star"></i></li>--}}
{{--                                              <li><i class="fa fa-star-half-o"></i></li>--}}
{{--                                          </ul>--}}
                                          {{-- <input id="input-1" name="input-1" class="rating rating-loading" data-min="0" data-max="5" data-step="0.1" value="{{ $user->averageRating }}" data-size="xs" disabled=""> --}}
                                      </div><!--star-descp end-->
                                      <div class="tab-feed">
                                          <ul>
                                              <li data-tab="feed-dd" class="active">
                                                  <a href="#" title="">
                                                      <img src="{{ url('design/style') }}/images/ic1.png" alt="">
                                                      <span>Feed</span>
                                                  </a>
                                              </li>

                                          </ul>
                                      </div><!-- tab-feed end-->
                                  </div><!--user-tab-sec end-->
                                  <div class="product-feed-tab current" id="feed-dd">

                                      @include('questions.index')

                                  </div><!--product-feed-tab end-->
                                  <div class="product-feed-tab" id="info-dd">
                                      <div class="user-profile-ov">
                                          <h3>Overview</h3>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. Nunc eu augue nec arcu efficitur faucibus. Aliquam accumsan ac magna convallis bibendum. Quisque laoreet augue eget augue fermentum scelerisque. Vivamus dignissim mollis est dictum blandit. Nam porta auctor neque sed congue. Nullam rutrum eget ex at maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget vestibulum lorem.</p>
                                      </div><!--user-profile-ov end-->
                                      <div class="user-profile-ov st2">
                                          <h3>Experience</h3>
                                          <h4>Web designer</h4>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                          <h4>UI / UX Designer</h4>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id.</p>
                                          <h4>PHP developer</h4>
                                          <p class="no-margin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                      </div><!--user-profile-ov end-->
                                      <div class="user-profile-ov">
                                          <h3>Education</h3>
                                          <h4>Master of Computer Science</h4>
                                          <span>2015 - 2018</span>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tempor aliquam felis, nec condimentum ipsum commodo id. Vivamus sit amet augue nec urna efficitur tincidunt. Vivamus consectetur aliquam lectus commodo viverra. </p>
                                      </div><!--user-profile-ov end-->
                                      <div class="user-profile-ov">
                                          <h3>Location</h3>
                                          <h4>India</h4>
                                          <p>151/4 BT Chownk, Delhi </p>
                                      </div><!--user-profile-ov end-->
                                      <div class="user-profile-ov">
                                          <h3>Skills</h3>
                                          <ul>
                                              <li><a href="#" title="">HTML</a></li>
                                              <li><a href="#" title="">PHP</a></li>
                                              <li><a href="#" title="">CSS</a></li>
                                              <li><a href="#" title="">Javascript</a></li>
                                              <li><a href="#" title="">Wordpress</a></li>
                                              <li><a href="#" title="">Photoshop</a></li>
                                              <li><a href="#" title="">Illustrator</a></li>
                                              <li><a href="#" title="">Corel Draw</a></li>
                                          </ul>
                                      </div><!--user-profile-ov end-->
                                  </div><!--product-feed-tab end-->

                              </div><!--main-ws-sec end-->
                          </div>
                          @include('categories.index')
                      </div>
                  </div><!-- main-section-data end-->
              </div>
          </div>
      </main>

      <div class="overview-box" id="create-portfolio">
          <div class="overview-edit">
              <h3>Create Portfolio</h3>
              <form>
                  <input type="text" name="pf-name" placeholder="Portfolio Name">
                  <div class="file-submit">
                      <input type="file" name="file">
                  </div>
                  <div class="pf-img">
                      <img src="{{ url('design/style') }}/images/resources/np.png" alt="">
                  </div>
                  <input type="text" name="website-url" placeholder="htp://www.example.com">
                  <button type="submit" class="save">Save</button>
                  <button type="submit" class="cancel">Cancel</button>
              </form>
              <a href="#" title="" class="close-box"><i class="la la-close"></i></a>
          </div><!--overview-edit end-->
      </div><!--overview-box end-->



  </div><!--theme-layout end-->


@endsection



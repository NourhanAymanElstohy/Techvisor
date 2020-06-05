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
						<div class="row">

							<div class="col-lg-3">
								<div class="main-left-sidebar">
									<div class="user_profile">
										<div class="user-pro-img">
											<img src="/uploads/avatars/{{$user->avatar}}" alt="">
											{{-- <img src="{{ url('design/style') }}/images/resources/user-pro-img.png" alt=""> --}}
										</div><!--user-pro-img end-->
										<div class="user_pro_status">
											<ul class="flw-hr">
												<li><a href="{{route('users.edit', Auth::user()->id)}}" title="" class="flww">Edit Profile</a></li>
											</ul>
										</div><!--user_pro_status end-->
					 					<ul class="social_links"> 										
											<li><a href="#" title=""><i class="la la-envelope" style="font-size:20px;color: #99ccff"></i>{{Auth::user()->email}}</a></li>
                                   @if ( Auth::user()->linkedin != null )
                                            <li><a href="#" title=""><i class="fa fa-linkedin" style="font-size:20px;color:#4d88ff"></i>{{Auth::user()->linkedin}}</a></li>
                                    @endif    
                                    @if (Auth::user()->github != null)
                                            <li><a href="#" title=""><i class="fa fa-github" style="font-size:20px;color:red"></i>{{Auth::user()->github}}</a></li>
                                    @endif    
                                    @if (Auth::user()->other != null)
                                            <li><a href="#" title=""><i class="la la-globe" style="font-size:20px;color:#004d99"></i>{{Auth::user()->other}}</a></li>
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
											<span>Graphic Designer at Self Employed</span>
											<ul>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
											</ul>
										</div><!--star-descp end-->
										<div class="tab-feed">
											<ul>
												<li data-tab="feed-dd" class="active">
													<a href="#" title="">
														<img src="{{ url('design/style') }}/images/ic1.png" alt="">
														<span>Feed</span>
													</a>
												</li>
												<li data-tab="info-dd">
													<a href="#" title="">
														<img src="{{ url('design/style') }}/images/ic2.png" alt="">
														<span>Info</span>
													</a>
												</li>
											
											</ul>
										</div><!-- tab-feed end-->
									</div><!--user-tab-sec end-->
									<div class="product-feed-tab current" id="feed-dd">
										<div class="posts-section">


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
											
										
											<div class="process-comm">
												<div class="spinner">
													<div class="bounce1"></div>
													<div class="bounce2"></div>
													<div class="bounce3"></div>
												</div>
											</div><!--process-comm end-->
										</div><!--posts-section end-->
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



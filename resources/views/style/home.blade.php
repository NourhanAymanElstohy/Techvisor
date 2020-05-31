@extends('style.index')
@section('content')


<div class="search-sec">
			<div class="container">
				<div class="search-box">
					<form>
						<input type="text" name="search" placeholder="Search keywords">
						<button type="submit">Search</button>
					</form>
				</div><!--search-box end-->
			</div>
		</div><!--search-sec end-->

<main>


			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
						@include('style.layouts.sidebar')
							<div class="col-lg-6 col-md-8 no-pd">
								<div class="main-ws-sec">
									
									<div class="posts-section">
										<div class="top-profiles">
											<div class="pf-hd">
												<h3>Top Profiles</h3>
												<i class="la la-ellipsis-v"></i>
											</div>
											<div class="profiles-slider">
												<div class="user-profy">
													<img src="{{ url('design/style') }}/images/resources/user1.png" alt="">
													<h3>John Doe</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="post-jb active follow">ASK</a></li>
														
														<li><a href="#" title="" class="hire">ZOOM</a></li>
													</ul>
													<a href="/style/profile" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="{{ url('design/style') }}/images/resources/user2.png" alt="">
													<h3>John Doe</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="post-jb active follow">ASk</a></li>
														
														<li><a href="#" title="" class="hire">ZOOM</a></li>
													</ul>
													<a href="/style/profile" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="{{ url('design/style') }}/images/resources/user3.png" alt="">
													<h3>John Doe</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="post-jb active follow">Ask</a></li>
														
														<li><a href="#" title="" class="hire">ZOOM</a></li>
													</ul>
													<a href="/style/profile" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="{{ url('design/style') }}/images/resources/user1.png" alt="">
													<h3>John Doe</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="post-jb active follow">ASk</a></li>
														
														<li><a href="#" title="" class="hire">ZOOM</a></li>
													</ul>
													<a href="/style/profile" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="{{ url('design/style') }}/images/resources/user2.png" alt="">
													<h3>John Doe</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="post-jb active follow">ASK</a></li>
														
														<li><a href="#" title="" class="hire">ZOOM</a></li>
													</ul>
													<a href="/style/profile" title="">View Profile</a>
												</div><!--user-profy end-->
												<div class="user-profy">
													<img src="{{ url('design/style') }}/images/resources/user3.png" alt="">
													<h3>John Doe</h3>
													<span>Graphic Designer</span>
													<ul>
														<li><a href="#" title="" class="post-jb active follow">ASK</a></li>
														
														<li><a href="#" title="" class="hire">ZOOM</a></li>
													</ul>
													<a href="/style/profile" title="">View Profile</a>
												</div><!--user-profy end-->
											</div><!--profiles-slider end-->
										</div><!--top-profiles end-->
										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<img src="{{ url('design/style') }}/images/resources/us-pic.png" alt="">
													<div class="usy-name">
														<h3>John Doe</h3>
														<span><img src="{{ url('design/style') }}/images/clock.png" alt="">3 min ago</span>
													</div>
												</div>
												<div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="#" title="">Edit Post</a></li>
														<li><a href="#" title="">Unsaved</a></li>
														<li><a href="#" title="">Unbid</a></li>
														<li><a href="#" title="">Close</a></li>
														<li><a href="#" title="">Hide</a></li>
													</ul>
												</div>
											</div>
											<div class="epi-sec">
												<ul class="descp">
													<li><img src="{{ url('design/style') }}/images/icon8.png" alt=""><span>Epic Coder</span></li>
													<li><img src="{{ url('design/style') }}/images/icon9.png" alt=""><span>India</span></li>
												</ul>
												<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
													<li><a href="#" title="" class="bid_now">Bid Now</a></li>
												</ul>
											</div>
											<div class="job_descp">
												<h3>Senior Wordpress Developer</h3>
												<ul class="job-dt">
													<li><a href="#" title="">Full Time</a></li>
													<li><span>$30 / hr</span></li>
												</ul>
												<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
												<ul class="skill-tags">
													<li><a href="#" title="">HTML</a></li>
													<li><a href="#" title="">PHP</a></li>
													<li><a href="#" title="">CSS</a></li>
													<li><a href="#" title="">Javascript</a></li>
													<li><a href="#" title="">Wordpress</a></li> 	
												</ul>
											</div>
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														<a href="#"><i class="fas fa-heart"></i> Like</a>
														<img src="{{ url('design/style') }}/images/liked-img.png" alt="">
														<span>25</span>
													</li> 
													<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment 15</a></li>
												</ul>
												<a href="#"><i class="fas fa-eye"></i>Views 50</a>
											</div>
										</div><!--post-bar end-->
										
										<div class="process-comm">
											<div class="spinner">
												<div class="bounce1"></div>
												<div class="bounce2"></div>
												<div class="bounce3"></div>
											</div>
										</div><!--process-comm end-->
									</div><!--posts-section end-->
								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3 pd-right-none no-pd">
								<div class="right-sidebar">
									<div class="widget widget-about">
										<img src="{{ url('design/style') }}/images/wd-logo.png" alt="">
										<h3>Track Time on Workwise</h3>
										<span>Pay only for the Hours worked</span>
										<div class="sign_link">
											<h3><a href="{{ url('design/style') }}/sign-in.html" title="">Sign up</a></h3>
											<a href="#" title="">Learn More</a>
										</div>
									</div><!--widget-about end-->
									<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Top Questions This Week</h3>
											<i class="la la-ellipsis-v"></i>
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
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Senior UI / UX Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Junior Seo Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Senior PHP Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
											<div class="job-info">
												<div class="job-details">
													<h3>Senior Developer Designer</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit..</p>
												</div>
												<div class="hr-rate">
													<span>$25/hr</span>
												</div>
											</div><!--job-info end-->
										</div><!--jobs-list end-->
									</div><!--widget-jobs end-->
									
									
								</div><!--right-sidebar end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>






	</div><!--theme-layout end-->
<!-- add the post Q -->

	<div class="post-popup job_post">
			<div class="post-project">
				<h3>Post a Question</h3>
				<div class="post-project-fields">
					<form>
						<div class="row">
							<div class="col-lg-6">
								<div class="price-br">
								 <h1> Who Can See This ? </h1>
									
								</div>
							</div>
							<div class="col-lg-6">
								<div class="inp-field">
									<select>
										<option>Public </option>
										<option>Private</option>
									</select>
								</div>
							</div>
							<div class="col-lg-12">
								<textarea name="Question" placeholder="Question"></textarea>
							</div>
							<div class="col-lg-12">
								<ul>
									<li><button class="active" type="submit" value="post">Post</button></li>
									<li><a href="#" title="">Cancel</a></li>
								</ul>
							</div>
						</div>
					</form>
				</div><!--post-project-fields end-->
				<a href="#" title=""><i class="la la-times-circle-o"></i></a>
			</div><!--post-project end-->
		</div><!--post-project-popup end-->

	@endsection
	
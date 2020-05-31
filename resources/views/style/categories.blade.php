
@extends('style.index')
@section('content')
		

		<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3>All Professional On This Category</h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
								<img src="{{ url('design/style') }}/images/resources/user2.png" alt="">
									<h3>Facebook Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
									<li><a class="post-jb active follow" href="#" title="">ASK</a></li>
										
									<li><a href="#" title="" class="hire">ZOOM</a></li>
									</ul>
								</div>
								<a href="/style/profile" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
								<img src="{{ url('design/style') }}/images/resources/user3.png" alt="">
									<h3>Google Inc.</h3>
									<h4>Establish Feb, 2004</h4>
							
									<ul>
									<li><a class="post-jb active follow" href="#" title="">ASK</a></li>
										
									<li><a href="#" title="" class="hire">ZOOM</a></li>
									</ul>
								
								</div>
								<a href="/style/profile" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
								<img src="{{ url('design/style') }}/images/resources/user1.png" alt="">
									<h3>Pinterest</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
									<li><a class="post-jb active follow" href="#" title="">ASK</a></li>
										
									<li><a href="#" title="" class="hire">ZOOM</a></li>
									</ul>
								</div>
								<a href="/style/profile" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
								<img src="{{ url('design/style') }}/images/resources/user2.png" alt="">
									<h3>Microsoft Inc.</h3>
									<h4>Establish Feb, 2004</h4>
									<ul>
									<li><a class="post-jb active follow" href="#" title="">ASK</a></li>
										
									<li><a href="#" title="" class="hire">ZOOM</a></li>
									</ul>
								</div>
								<a href="/style/profile" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>
					
						
					</div>
				</div><!--companies-list end-->
				<div class="process-comm">
					<div class="spinner">
						<div class="bounce1"></div>
						<div class="bounce2"></div>
						<div class="bounce3"></div>
					</div>
				</div><!--process-comm end-->
			</div>
		</section><!--companies-info end-->

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
	
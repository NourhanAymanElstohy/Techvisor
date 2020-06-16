@extends('layouts.app')
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
										<ul class="flw-hr">
											<li><a href="{{route('users.edit', $user->id)}}" title="" class="flww">Edit Profile</a></li>
										</ul>
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
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="main-ws-sec">
								<div class="user-tab-sec">
									<h3>{{$user->name}}</h3>
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
									@include('questions.index')
								</div>
							</div>
						</div>
						@include('categories.index2')
					</div>
				</div>
			</div> 
		</div>
	</main>
</div>

	
@endsection



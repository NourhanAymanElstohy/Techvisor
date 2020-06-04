<div class="wrapper">	
		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="/style" title=""><img src="{{ url('design/style') }}/images/logo.png" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
						<form>
							<input type="text" name="search" placeholder="Search...">
							<button type="submit"><i class="la la-search"></i></button>
						</form>
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
								<a href="/style" title="">
									<span><img src="{{ url('design/style') }}/images/icon1.png" alt=""></span>
									Home
								</a>
							</li>
							
						@Auth

							<li>
								<a href="#" title="" class="not-box-open">
									<span><img src="{{ url('design/style') }}/images/icon7.png" alt=""></span>
									Notification
								</a>

								<div class="notification-box noti" id="notification">
									<div class="nt-title">
										<h4>Setting</h4>
										<a href="#" title="">Clear all</a>
									</div>
									<div class="nott-list">
									@foreach((auth()->user())->notifications as $notification)
										@if($notification->type=='App\Notifications\NewQuestion')
											@if($notification->unread())
											<a class="dropdown-item bg-secondary" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
											{{$notification->data['user_name'] }} ask {{$notification->data['question']}}
											{{$notification->markAsRead()}}
											<?php echo("</br>") ?>
											</a>
											@else
											<a class="dropdown-item" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
											{{$notification->data['user_name'] }} ask {{$notification->data['question']}}
											{{$notification->markAsRead()}}
											<?php echo("</br>") ?>
											</a>

											@endif 
										@else
											@if($notification->unread())
											<a class="dropdown-item bg-secondary" href="#">
											{{$notification->data['user_name'] }} want to zoom meeting
											{{$notification->markAsRead()}}
											<?php echo("</br>") ?>
											</a>
											@else 
											<a class="dropdown-item " href="#">
											{{$notification->data['user_name'] }} want to zoom meeting
											{{$notification->markAsRead()}}
											<?php echo("</br>") ?>
											</a>

											@endif 
										@endif 
									@endforeach
										<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="{{ url('design/style') }}/images/resources/ny-img1.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="{{ url('design/style') }}/images/resources/ny-img2.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="{{ url('design/style') }}/images/resources/ny-img3.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="notfication-details">
							  				<div class="noty-user-img">
							  					<img src="{{ url('design/style') }}/images/resources/ny-img2.png" alt="">
							  				</div>
							  				<div class="notification-info">
							  					<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
							  					<span>2 min ago</span>
							  				</div><!--notification-info -->
						  				</div>
						  				<div class="view-all-nots">
						  					<a href="#" title="">View All Notification</a>
						  				</div>
									</div><!--nott-list end-->
								</div><!--notification-box end-->
							</li>
							@endauth
							<li>
								<a href="/style/about" title="">
									<span><img src="{{ url('design/style') }}/images/icon2.png" alt=""></span>
									About Us
								</a>
								
								
							</li>
						
				
							
						
						@guest
							<li >
								<a  href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
								@if (Route::has('register'))
								<li >
									<a href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
								@endif
								</ul>
					<!--nav end--> </nav>	
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->

							@else
							</ul>
					<!--nav end--> </nav>
							<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
						<div class="user-account">
							<div class="user-info">
						
								<img src="{{ url('design/style') }}/images/resources/user.png" alt="">
								<a href="#" title="">{{ Auth::user()->name }}</a>
								<i class="la la-sort-down"></i>
							</div>
						<div class="user-account-settingss" id="users">

										
											
			
						@hasanyrole('professional|super-admin')
							<h3>Online Status</h3>
							<ul class="on-off-status">

							<li> 										
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
										</label>
										@if($user->status==0)
										  <small>You Are Online</small>
                                        @elseif($user->status==1)
										  <small>You Are Offline</small>
                                        @endif  
									</div>
						    </li>

							@if($user->status==0) 
								<li> 										
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
											<span></span>
										</label>
										<small><a href="{{route('professionals.changestatus',$user->id)}}">Offline</a></small>
									</div>
								</li>
								@else
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c6">
										<label for="c6">
											<span></span>
										</label> 
										<small><a href="{{route('professionals.changestatus', $user->id)}}">Online</a></small>
									</div>
								</li>
								@endif
							</ul>
							@endhasanyrole
							
							<h3>Setting</h3>
							<ul class="us-links">
								<li><a href="profile-account-setting.html" title="">Account Setting</a></li>
								<li><a href="#" title="">Privacy</a></li>
								<li><a href="#" title="">Faqs</a></li>
								<li><a href="#" title="">Terms & Conditions</a></li>
							</ul>
						

										
							<h3 class="tc">
								<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										{{ __('Logout') }} 
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
								</form>
							</h3>
						</div><!--user-account-settingss end-->
						@endguest
					
					</div>
				</div><!--header-data end-->
			</div>
		</header><!--header end-->
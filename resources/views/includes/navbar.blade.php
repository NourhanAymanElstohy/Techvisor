<div class="wrapper">	
		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="/home" title=""><h1 class="font-weight-bold text-capitalize text-light mt-1" style="font-family: 'Serif', cursive; font-size:30px">Techvisor</h1></a>
					</div><!--logo end-->
					<div class="search-bar">
						
					</div><!--search-bar end-->
					<nav>
						<ul>
							<li>
							@hasanyrole('super-admin|user|professional')
								<a href="{{route('home')}}" title="">
									<span><img src="{{ url('design/style') }}/images/icon1.png" alt=""></span>
									Home
								</a>
								@else
								<a href="/" title="">
									<span><img src="{{ url('design/style') }}/images/icon1.png" alt=""></span>
									Home
								</a>
								@endhasanyrole
							</li>
							<li>
								<a href="{{route('about')}}" title="">
									<span><img src="{{ url('design/style') }}/images/icon2.png" alt=""></span>
									About Us
								</a>
								
							</li>
							
						@Auth
						<li>
						@hasanyrole('super-admin|user')
								<a href="{{route('user.show', Auth::user()->id)}}" title="">
									<span><img src="{{ url('design/style') }}/images/icon4.png"  alt=""></span>
									{{ Auth::user()->name }}
								</a>
						@else
								<a href="{{route('professional.show', Auth::user()->id)}}" title="">
									<span><img src="{{ url('design/style') }}/images/icon4.png" alt=""></span>
									{{ Auth::user()->name }}
								</a>
						@endhasanyrole
							</li>

							@if(Auth::user()->role==2) 
							<li>
								<a href="{{route('profcat')}}" title="">
									<span><img src="{{ url('design/style') }}/images/icon4.png" alt=""></span>
									Categories
								</a>
							</li>
							@endif




							<li>
								<a href="#" title="" class="not-box-open">
									<span><img src="{{ url('design/style') }}/images/icon7.png" alt=""></span>
									Notification
								</a>

								<div class="notification-box noti" id="notification">
									<div class="nt-title">
										<h4>Notification</h4>
										<a href="#" title="">Clear all</a>
									</div>

									<div class="nott-list" >
									@foreach((auth()->user())->notifications as $notification)
									     <div class="notfication-details">
									     <div class="noty-user-img">
								            	<img src="{{ url('design/style') }}/images/resources/circle-cropped.png" alt="">
									     </div>

									     <div class="notification-info ">
									@if($notification->type=='App\Notifications\NewQuestion')
												@if($notification->unread())

													<h3><a  class="dropdown-item bg-secondary" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p >{{$notification->data['user_name'] }} ask  {{ Illuminate\Support\Str::limit ($notification->data['question'],4)}}</p>

													<span><a  class="dropdown-item bg-secondary" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p>{{$notification->data['user_name'] }} ask {{ Illuminate\Support\Str::limit($notification->data['question'],4)}}</p>

													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></span>
												@else

													<h3><a class="dropdown-item " href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p>{{$notification->data['user_name'] }} ask {{ Illuminate\Support\Str::limit($notification->data['question'],4)}}</p> 

													<span><a class="dropdown-item" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p width: 5em>{{$notification->data['user_name'] }} ask  {{ Illuminate\Support\Str::limit($notification->data['question'],4)}}</p>

													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></span>
												@endif 
										@elseif($notification->type=='App\Notifications\NewZoom')
													@if($notification->unread())
													<h3><a class="dropdown-item bg-secondary" href="#">
													<p>{{$notification->data['user_name'] }} want to zoom meeting</p>
													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></h3>
												@else 
													<a class="dropdown-item " href="#">
													<p>{{$notification->data['user_name'] }} want to zoom meeting</p>
													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a>
												@endif 
										@elseif($notification->type=='App\Notifications\NewAnswer')		
														@if($notification->unread())
															<p style="text-align:justify"><a  class="dropdown-item bg-secondary" href="{{route('answers.show',['answer'=> $notification->data['answer_id']])}}">
															<p>{{$notification->data['user_name'] }} reply by {{ Illuminate\Support\Str::limit($notification->data['answer'],4)}}</p>
															{{$notification->markAsRead()}}
															<?php echo("</br>") ?>
															</a></p>
														@else
															<p style="text-align:justify"><a class="dropdown-item" href="{{route('answers.show',['answer'=> $notification->data['answer_id']])}}">
															<p>{{$notification->data['user_name'] }} reply by {{ Illuminate\Support\Str::limit($notification->data['answer'],4)}}</p>
															{{$notification->markAsRead()}}
															<?php echo("</br>") ?>
															</a></p>
														@endif 
										@endif 
										</div>
									</div>
									@endforeach
									<div class="view-all-nots">
						  					<a href="#" title="">View All Notification</a>
						  				</div>

									</div><!--nott-list end-->
								</div><!--notification-box end-->
							</li>
						</ul>
					</nav><!--nav end-->

									
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->

						<div class="user-account">
							<div class="user-info">
							<img src="/uploads/avatars/{{Auth::user()->avatar}}" alt="" width="30px" height="30px">
								<i class="la la-sort-down"></i>
							</div>
						<div class="user-account-settingss" id="users">

										
											
			
						@if(Auth::user()->role==2) 
							<h3>Online Status</h3>
							<ul class="on-off-status">

							<li> 										
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
										</label>
										@if(Auth::user()->status==0)
										  <small>You Are Online</small>
                                        @elseif(Auth::user()->status==1)
										  <small>You Are Offline</small>
                                        @endif  
									</div>
						    </li>

							@if(Auth::user()->status==0) 
								<li> 										
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c5">
										<label for="c5">
											<span></span>
										</label>
										<small><a href="{{route('professionals.changestatus',Auth::user()->id)}}">Offline</a></small>
									</div>
								</li>
								@else
								<li>
									<div class="fgt-sec">
										<input type="radio" name="cc" id="c6">
										<label for="c6">
											<span></span>
										</label> 
										<small><a href="{{route('professionals.changestatus', Auth::user()->id)}}">Online</a></small>
									</div>
								</li>
								@endif
							</ul>
							@endif
							
							<h3>Setting</h3>
							<ul class="us-links">
							@if(Auth::user()->role==2)
							<li><a href="{{route('professionals.edit', Auth::user()->id)}}" title="">Account Setting</a></li>
							@else	
							<li><a href="{{route('users.edit', Auth::user()->id)}}" title="">Account Setting</a></li>
							@endif
								<li><a href="#" title="">Privacy</a></li>
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

							</div>
							</div>
							</div>
							</div>
							@endauth
					
						@guest
							<li > 
							<span><img src="{{ url('design/style') }}/images/login-xxl.png"  width="15" height="15"alt=""></span>
								<a  href="{{ route('login') }}">{{ __('Login') }}</a>
							</li>
							
								@if (Route::has('register'))
								<li > 
								<span><img src="{{ url('design/style') }}/images/add-user-xxl.png"  width="15" height="15"alt=""></span>
									<a href="{{ route('register') }}">{{ __('Register') }}</a>
								</li>
								@endif
								
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->							
						@endguest
						</ul>
					<!--nav end--> </nav>	
				</div><!--header-data end-->
			</div>
		</header><!--header end-->
		</div>

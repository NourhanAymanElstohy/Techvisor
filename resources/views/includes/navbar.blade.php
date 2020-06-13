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
									<span>
									<img src="{{ url('design/style') }}/images/icon1.png" alt="">
									</span>
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
									<span>
									<img src="{{ url('design/style') }}/images/icon7.png"  alt="">
									<img src="{{ url('design/style') }}/images/circle-cropped (2).png" width="9" height="9" style="float:right">
									</span>
									Notification
								</a>

								<div class="notification-box noti" id="notification">
									<div class="nt-title">
										<h4>Notification</h4>
										<a href="#" title="">Clear all</a>
									</div>

									<div class="nott-list" >
									@foreach((auth()->user())->notifications->take(5) as $notification)
									     <div class="notfication-details">
									     <div class="noty-user-img">
								            	<img src="{{ url('design/style') }}/images/resources/circle-cropped.png" alt="">
									     </div>

									     <div class="notification-info ">
									@if($notification->type=='App\Notifications\NewQuestion')
												@if($notification->unread())

													<h3><a  class="dropdown-item bg-secondary" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p >{{$notification->data['user_name'] }} ask  {{ Illuminate\Support\Str::limit ($notification->data['question'],4)}}</p

													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></h3>
												@else
													<h3><a class="dropdown-item" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p>{{$notification->data['user_name'] }} ask  {{ Illuminate\Support\Str::limit($notification->data['question'],4)}}</p>

													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></h3>
												@endif 
										@elseif($notification->type=='App\Notifications\NewZoom')
													@if($notification->unread())
													<h3><a class="dropdown-item bg-secondary " href="{{$notification->data['join_url']}}">
													<p class="text-light">{{$notification->data['user_name'] }} connect {{ Illuminate\Support\Str::limit($notification->data['join_url'],4) }}</p>
													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></h3>
												@else 
												<h3><a class="dropdown-item " href="{{$notification->data['join_url']}}">
													<p>{{$notification->data['user_name'] }}connect {{Illuminate\Support\Str::limit($notification->data['join_url'],4)}}</p>
													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a><h3>
												@endif 
										@elseif($notification->type=='App\Notifications\NewAnswer')		
														@if($notification->unread())
															<h3><a  class="dropdown-item bg-secondary" href="{{route('answers.show',['answer'=> $notification->data['answer_id']])}}">
															<p>{{$notification->data['user_name'] }} reply by {{ Illuminate\Support\Str::limit($notification->data['answer'],4)}}</p>
															{{$notification->markAsRead()}}
															<?php echo("</br>") ?>
															</a></h3>
														@else
															<h3 ><a class="dropdown-item" href="{{route('answers.show',['answer'=> $notification->data['answer_id']])}}">
															<p>{{$notification->data['user_name'] }} reply by {{ Illuminate\Support\Str::limit($notification->data['answer'],4)}}</p>
															{{$notification->markAsRead()}}
															<?php echo("</br>") ?>
															</a></h3>
														@endif 
										@endif 
										</div>
									</div>
									@endforeach

									<div class="view-all-nots">
									<a  data-toggle="modal" data-target="#exampleModal" title="">View All Notification</a>
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
								<li><a href="{{route('users.privacy')}}" title="">Privacy</a></li>
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
			<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">All Notifications</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <div class="nott-list" >
	  @Auth
									@foreach((auth()->user())->notifications as $notification)
									     <div class="notfication-details">
									     <div class="noty-user-img">
								            	<img src="{{ url('design/style') }}/images/resources/circle-cropped.png" alt="">
									     </div>

									     <div class="notification-info ">
									@if($notification->type=='App\Notifications\NewQuestion')
												@if($notification->unread())

													<h3><a  class="dropdown-item bg-secondary" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p >{{$notification->data['user_name'] }} ask  {{ Illuminate\Support\Str::limit ($notification->data['question'],4)}}</p

													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></h3>
												@else
													<h3><a class="dropdown-item" href="{{route('questions.show',['question'=> $notification->data['question_id']])}}">
													<p>{{$notification->data['user_name'] }} ask  {{ Illuminate\Support\Str::limit($notification->data['question'],4)}}</p>

													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></h3>
												@endif 
										@elseif($notification->type=='App\Notifications\NewZoom')
													@if($notification->unread())
													<h3><a class="dropdown-item bg-secondary " href="{{$notification->data['join_url']}}">
													<p class="text-light">{{$notification->data['user_name'] }} connect {{$notification->data['join_url'] }}</p>
													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a></h3>
												@else 
												<h3><a class="dropdown-item " href="{{$notification->data['join_url']}}">
													<p>{{$notification->data['user_name'] }} want to zoom meeting</p>
													{{$notification->markAsRead()}}
													<?php echo("</br>") ?>
													</a><h3>
												@endif 
										@elseif($notification->type=='App\Notifications\NewAnswer')		
														@if($notification->unread())
															<h3><a  class="dropdown-item bg-secondary" href="{{route('answers.show',['answer'=> $notification->data['answer_id']])}}">
															<p>{{$notification->data['user_name'] }} reply by {{ Illuminate\Support\Str::limit($notification->data['answer'],4)}}</p>
															{{$notification->markAsRead()}}
															<?php echo("</br>") ?>
															</a></h3>
														@else
															<h3 ><a class="dropdown-item" href="{{route('answers.show',['answer'=> $notification->data['answer_id']])}}">
															<p>{{$notification->data['user_name'] }} reply by {{ Illuminate\Support\Str::limit($notification->data['answer'],4)}}</p>
															{{$notification->markAsRead()}}
															<?php echo("</br>") ?>
															</a></h3>
														@endif 
										@endif 
										</div>
									</div>
									@endforeach
      </div>
      <div class="modal-footer">
        <button type="button" class="btn " data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endauth
		</header><!--header end-->
		</div>

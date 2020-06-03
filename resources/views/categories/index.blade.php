

<div class="col-lg-3 col-md-4 pd-left-none no-pd">
								<div class="main-left-sidebar no-margin">

									<div class="suggestions full-width">

										<div class="sd-title">
											<h3>CATEGORIES</h3>
										</div><!--sd-title end-->

										<div class="suggestions-list">

								
											@foreach ($categories as $category) 
											<div class="suggestion-usd">
												<div class="sgt-text">
													<div class="post-st">

											<ul>
                                             <li> 
                                                <a href="{{route('categories.show',['category' => $category->id])}}">
				                               {{$category->name}}</a>
                                             </li>
											</ul>

										     </div><!--post-st end-->
												</div>
                                                  </div>
                                                   @endforeach
												 

												<div class="view-more">
												<a href="/style/categories" title="">View More</a>
											</div>
										
												
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									
								</div><!--main-left-sidebar end-->
							</div>

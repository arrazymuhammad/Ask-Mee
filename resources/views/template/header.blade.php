<section>
		<header>
			<div class="main-header-upper">
				<div class="container custom">
					<div class="navbars uppernav ">
						<ul class="navbar-navs options-nav  text-center pt-2 mb-0">
							<li class="nav-item logo-main">
								<a class="nav-link custom p-0" href="{{url('/')}}">
									<img class="img-fluid logo" alt="logo" src="{{url('/images/logo.png')}}">
								</a>
							</li>  
							<li class="nav-item pull-right ask-question-nav d-none d-md-flex">
							@if(!Auth::check())
								<a data-toggle="modal" data-target="#signupModal" class="nav-link custom">  Ask a Question </a>
							@else
								<a href="{{url('question/create')}}" class="nav-link custom">  Ask a Question </a>
							@endif
							</li>
						
							@if(Auth::check())
								<li class="nav-item dropdown pull-right d-none d-md-flex">
									<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
										<img src="{{url('images/')}}" class="user-pic-nav" alt=""/>Ar-Razy Muhammad (Point : {{Auth::user()->point}})
									</a>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="{{url('logout')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a>
									</div>
								</li> 
							@else
								<li class="nav-item dropdown pull-right d-none d-md-flex">
									<a href="#" data-toggle="modal" data-target="#signupModal" class="nav-link">  Login </a>
								</li>
							@endif
						</ul>
					</div>
				</div>
			</div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         
		</header>
	</section>
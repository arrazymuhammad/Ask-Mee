<div class="modal fade signin" id="signupModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
	        <!-- Modal body -->
	        <div class="modal-body">
				<!-- <button type="button" class="close" data-dismiss="modal"><i class="icon ion-md-close"></i></button> -->
				<ul class="nav nav-pills signin w-100 text-center" role="tablist">
					<li class="nav-item w-50">
					  <a class="nav-link active" data-toggle="pill" href="#home">Log In <span><i class="fa fa-sign-in" aria-hidden="true"></i></span></a>
					</li>
					<li class="nav-item w-50">
					  <a class="nav-link" data-toggle="pill" href="#menu1">Sign Up <span><i class="icon ion-md-person"></i></span></a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div id="home" class="container tab-pane active py-4">
						<div class=" row">
							<div class="col-md-12">
								<form class="sign" action="{{url('login')}}" method="post">
									@csrf
									<div class="form-group">
										<label>Enter your Email</label>
										<input name="email" value="" type="email" placeholder="Email">
										<span class="icon-input"><i class="icon ion-md-mail"></i></span>
									</div>
									<div class="form-group">
										<label>Enter your Password</label>
										<input name="password" value="" type="password" placeholder="Password">
										<span class="icon-input"><i class="icon ion-md-unlock"></i></span>
									</div>
									<button class="btn btn-signin">Sign In</button>
								</form>
							</div>
						</div>
					</div>
					<div id="menu1" class="container tab-pane fade py-4">
						<form class="sign" action="{{url('register')}}" method="post">
							@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Display Name</label>
										<input value="" type="text" name="name" placeholder="Your name">
										<span class="icon-input"><i class="icon ion-md-person"></i></span>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Enter your Email</label>
										<input value="" type="email" name="email" placeholder="Email">
										<span class="icon-input"><i class="icon ion-md-mail"></i></span>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label>Enter your Password</label>
										<input value="" type="password" name="password" placeholder="Password">
										<span class="icon-input"><i class="icon ion-md-unlock"></i></span>
									</div>
									<button id="signup" class="btn btn-signin">Sign Up</button> 
								</div>
							</div>
						</form>
					</div>
				</div>
	        </div>
	      </div>
	    </div>
	</div>
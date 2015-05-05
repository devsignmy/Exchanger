@extends("app")

@section("pageTitle", "Blank Template")

@section("content")
	<div class="login-container-1">
		
		<div class="row no-margin" style="height: 100%;">
			<div class="col-xs">
				<div class="login-background">
					<div class="login-image" style="background-image: url(/img/wall.jpg)"></div>
					<div class="login-overlay"></div>
					<div class="login-title">
						<svg version="1.1" id="devsign-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 width="200px" height="200px" viewBox="0 0 200 200" enable-background="new 0 0 200 200" xml:space="preserve">
							<g>
								<polygon class="stroke" fill="none" stroke="#FFFFFF" stroke-width="12.7908" stroke-miterlimit="10" points="100.003,7.818 179.829,53.909 179.829,146.094 100.003,192.182 20.171,146.094 20.171,53.909    "/>
								<g>
									<polygon fill="#FFFFFF" points="100.002,100.001 39.588,65.12 39.588,134.879 100.002,169.761 160.412,134.879 160.412,65.12 "/>
									<polygon fill="#F5F6F6" points="39.588,65.12 100.002,100.001 100.002,169.761 39.588,134.879 "/>
								</g>
							</g>
						</svg>
					 	<div class="font-display2 font-light font-white">Welcome to Exchanger (Beta)</div>
					 	<div class="font-headline font-white">User Control Panel</div>
					</div>
					<div class="toolbar absolute">
						<div class="toolbar-inner transparent">
							<a class="icon-button ripple morph" href="javascript:" data-side-navigation=".side-navigation">
								<i data-icon="menu" class="white" ></i>
								<i data-icon="arrow-left" class="white" ></i>
							</a>
							<div class="toolbar-title">Exchanger (Beta)</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-sm-6">
				<div class="login-form">
					<div class="font-title" style="margin-bottom: 24px;">Login to System</div>
					<form method="POST" action="/login">
						<input type="hidden" name="_token" value="{{ $csrf_token }}">
						<input type="hidden" name="remember_computer" value="0" />
						<input type="text" placeholder="Username/Email" name="username_email" data-normal-input />
						<input type="password" placeholder="Password" name="password" data-normal-input />
						<input type="checkbox" data-switch="Remember my computer" name="remember_computer" value="1" />

						<div class="pull-right">
							<button type="submit" class="raised-button secondary ripple">Login</button>
						</div>
					</form>
					<div class="clearfix"></div>
					<div class="login-actions">
						<div class="login-actions-title">Additional Actions</div>
						<div class="login-actions-link"><a href="javascript:;" data-activate=".login-signup">Register</a> | <a href="javascript:">Lost Password</a></div>
					</div>

					<div class="login-signup">
						<a href="javascript:;" class="flat-button grey" data-deactivate=".login-signup"><i data-icon="arrow-left"></i> &nbsp; Back</a>
						<div class="clearfix" style="margin-bottom: 8px;"></div>
						<div class="font-title" style="margin-bottom: 24px;">Signup for new User</div>
						<form method="POST" action="/signup">
							<input type="hidden" name="_token" value="{{ $csrf_token }}">
							<input type="text" placeholder="First Name" name="firstname" data-normal-input />
							<input type="text" placeholder="Last Name" name="lastname" data-normal-input />
							<input type="text" placeholder="Username" name="username" data-normal-input />
							<input type="text" placeholder="Email Address" name="email" data-normal-input />
							<input type="password" placeholder="Password" name="password" data-normal-input />
							<input type="password" placeholder="Confirm Password" name="confirm_password" data-normal-input />
							<input type="checkbox" data-switch="Agree with Terms & Conditions" name="agree" value="1" />

							<div class="pull-right">
								<button type="submit" class="raised-button secondary ripple">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@stop
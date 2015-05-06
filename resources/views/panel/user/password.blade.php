@extends("app")

@section("pageTitle", "Blank Template")

@section("toolbar")
	@include('templates.default-toolbar')
@stop

@section("content")
	<div style="padding: 16px; max-width: 1312px; margin: 0 auto">
		@include('templates.page-message', compact("success", "error"))
		<div class="card">
			<form method="POST" action="/panel/user/password" style="margin: 0">
				<div class="card-title">
					<div class="font-title font-normal">Change User Password</div>
					<input type="hidden" name="_token" value="{{ $csrf_token }}">
					<input type="hidden" name="user_id" value="{{ $encrypted_id }}">
					<div class="row">
						<div class="col-xs-fluid-8">
							<input type="password" placeholder="Old Password" name="old_password" data-normal-input />
						</div>
					</div>
					<div class="row">
						<div class="col-xs-fluid-8">
							<input type="password" placeholder="New Password" name="password" data-normal-input />
						</div>
						<div class="col-xs-fluid-8">
							<input type="password" placeholder="Confirm Password" name="confirm_password" data-normal-input />
						</div>
					</div>
				</div>
				<div class="card-action">
					<div class="pull-right">
						<button type="submit" class="flat-button primary m-r-8 ripple">Change Password</button>
					</div>
				</div>
			</form>

		</div>
	</div>
@stop

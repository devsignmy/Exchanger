@extends("app")

@section("pageTitle", "Blank Template")

@section("toolbar")
@include('templates.default-toolbar')
@stop

@section("content")
<div style="padding: 16px; max-width: 960px; margin: 0 auto">
	<div class="row">
		<div class="col-xs-fluid-24">
			@include('templates.page-message', compact("success", "error"))
			<div class="card">
				<form method="POST" action="/panel/bank/edit" style="margin: 0">
					<div class="card-title">
						<div class="font-title font-normal">Add New Bank Account</div>
						<input type="hidden" name="_token" value="{{ $csrf_token }}">
						<input type="hidden" name="bank_id" value="{{ $encrypt_id }}">
						<div class="row">
							<div class="col-xs-fluid-12">
								<input type="text" placeholder="Bank Name" name="name" value="{{$bank->name}}" data-normal-input />
							</div>
							<div class="col-xs-fluid-12">
								<input type="text" placeholder="Account Holder Name" name="holder_name" value="{{$bank->holder_name}}" data-normal-input />
							</div>
							<div class="col-xs-fluid-12">
								<input type="text" placeholder="Account Holder Number" name="holder_number" value="{{$bank->holder_number}}" data-normal-input />
							</div>
							<div class="col-xs-fluid-12">
								<select name="country_id" id="">
									@foreach($countrys as $country)
									<option value="{{$country->id}}" @if($country->id == $bank->country_id) selected @endif >{{$country->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="card-action">
						<div class="pull-right">
							<button type="reset" class="flat-button secondary m-r-8 ripple">Reset</button>
							<button type="submit" class="flat-button primary m-r-8 ripple">Edit Bank Account</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>

</div>
@stop

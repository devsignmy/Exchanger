@if (Session::has("success"))
	<div class="alert success">
		{!! Session::get("success")!!}
	</div>
@endif

@if (Session::has("error"))
	<div class="alert error">
		{!! Session::get("error") !!}
	</div>
@endif
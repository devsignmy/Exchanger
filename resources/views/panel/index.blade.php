@extends("app")

@section("pageTitle", "Blank Template")

@section("toolbar")
	@include('templates.default-toolbar')
@stop

@section("content")

	<div style="padding: 16px; max-width: 1312px; margin: 0 auto">
		<div class="row">
			<div class="col-xs-fluid-8">
				<a  href="javascript:;" class="card">
					<div class="card-image">
						<img src="/img/back1.png" />
					</div>
					<div class="card-title">
						<div class="font-title font-normal">UToken Balance</div>
					</div>
				</a>
			</div>
			<div class="col-xs-fluid-8">
				<a  href="javascript:;" class="card">
					<div class="card-image">
						<img src="/img/back1.png" />
					</div>
					<div class="card-title">
						<div class="font-title font-normal">Buy This Month</div>

					</div>
				</a>
			</div>
			<div class="col-xs-fluid-8">
				<a  href="javascript:;" class="card">
					<div class="card-image">
						<img src="/img/back1.png" />
					</div>
					<div class="card-title">
						<div class="font-title font-normal">Sell This Month</div>
					</div>
				</a>
			</div>
		</div>
		<div class="font-headline" style="margin-top: 24px;">Customer Buy : </div>
		<div class="row">
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in USD : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple" data-dialog=".dialog">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in MYR : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in IDR : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in BAHT : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple">Change Price</button>
					</div>
				</div>
			</div>
		</div>
		<div class="font-headline" style="margin-top: 24px;">Customer Sell : </div>
		<div class="row">
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in USD : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in MYR : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in IDR : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in BAHT : </div>
						<div class="font-display1 font-light">USD 10.00</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple">Change Price</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="dialog">
		<div class="dialog-inner">

		</div>
	</div>
@stop

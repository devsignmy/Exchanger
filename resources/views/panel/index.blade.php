@extends("app")

@section("pageTitle", "Blank Template")

@section("toolbar")
	@include('templates.default-toolbar')
@stop

@section("content")
	@if ($is_user)
	<div style="padding: 16px; max-width: 1312px; margin: 0 auto">
		<div class="noti m-b-16">
			<div class="noti-title">Dear Value Customers,</div>
			<div class="noti-text m-b-8">We are automatically get your location for currency purpose. UToken are globally uses but we only focus for 3 main country that is Malaysia, Thailand and Indonesia. Other than 3 of these countries, payment are through Western Union.</div>
			<div class="noti-text m-b-8">For customer who are from these 3 countries, we suggest you to not use any proxy server to access our website. Otherwise, we cannot get best result for you. Thank You. </div>
		</div>
		<div class="font-headline">Our UToken Price</div>
		<div class="row">
			<div class="col-xs-fluid-12">
				<div class="card card-hover">
					<div class="card-image">
						<img src="/img/back1.png" />
						<div class="card-image-info">
							<div class="font-title font-white font-light m-t-16">Company Buy From You</div>
							<div class="font-display2 font-white m-b-16">RM {{Exchanger\Price::getMYRSell() }}</div>
							<a href="javascript:" class="raised-button ripple primary m-t-16">Sell Your UToken</a>
						</div>
						<div class="card-overlay"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-12">
				<div class="card card-hover">
					<div class="card-image">
						<img src="/img/back1.png" />
						<div class="card-image-info">
							<div class="font-title font-white font-light m-t-16">Company Sell To You</div>
							<div class="font-display2 font-white m-b-16">RM {{Exchanger\Price::getMYRBuy() }}</div>
							<a href="javascript:" class="raised-button ripple primary m-t-16">Buy UToken</a>
						</div>
						<div class="card-overlay"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24">
				<div class="pull-right">

				</div>
			</div>
		</div>
	</div>
	@endif

	@if($is_admin)
	<div style="padding: 16px; max-width: 1312px; margin: 0 auto">
		<div class="font-headline m-t-24">Quick Reports</div>
		<div class="row">
			<div class="col-xs-fluid-8">
				<div class="card">
					<div class="card-image">
						<img src="/img/back1.png" />
						<div class="card-image-info">
							<div class="font-title font-white font-light">UToken Balance</div>
							<div class="font-display1 font-white">{{Exchanger\Transaction::getUToken()}}</div>
						</div>
						<div class="card-overlay"></div>
					</div>
				</div>
				<div>
					<a href="javascript:" data-dialog="#add-utoken" class="raised-button ripple primary m-t-8 m-r-8">Add UToken</a>
					<a href="javascript:" data-dialog="#sub-utoken" class="raised-button ripple primary m-t-8">Sub UToken</a>
				</div>

			</div>
			<div class="col-xs-fluid-8">
				<div class="card">
					<div class="card-image">
						<img src="/img/back1.png" />
						<div class="card-image-info">
							<div class="font-title font-white font-light">Buy This Month</div>
							<div class="font-display1 font-white">U 1000</div>
						</div>
						<div class="card-overlay"></div>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-8">
				<div class="card">
					<div class="card-image">
						<img src="/img/back1.png" />
						<div class="card-image-info">
							<div class="font-title font-white font-light">Sell This Month</div>
							<div class="font-display1 font-white">U 1000</div>
						</div>
						<div class="card-overlay"></div>
					</div>
				</div>
			</div>

		</div>
		<div class="font-headline" style="margin-top: 24px;">Customer Buy : </div>
		<div class="row">
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in USD : </div>
						<div class="font-display1 font-light">USD {{ Exchanger\Price::getUSDBuy() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple" data-dialog="#usd-buy">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in MYR : </div>
						<div class="font-display1 font-light">MYR {{ Exchanger\Price::getMYRBuy() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple"  data-dialog="#myr-buy">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in IDR : </div>
						<div class="font-display1 font-light">IDR {{ Exchanger\Price::getIDRBuy() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple"  data-dialog="#idr-buy">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in BAHT : </div>
						<div class="font-display1 font-light">BAHT {{ Exchanger\Price::getBAHTBuy() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple"  data-dialog="#baht-buy">Change Price</button>
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
						<div class="font-display1 font-light">USD {{ Exchanger\Price::getUSDSell() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple" data-dialog="#usd-sell">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in MYR : </div>
						<div class="font-display1 font-light">MYR {{ Exchanger\Price::getMYRSell() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple" data-dialog="#myr-sell">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in IDR : </div>
						<div class="font-display1 font-light">IDR {{ Exchanger\Price::getIDRSell() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple" data-dialog="#idr-sell">Change Price</button>
					</div>
				</div>
			</div>
			<div class="col-xs-fluid-24 col-xd-fluid-12 col-sm-fluid-8 col-md-fluid-6">
				<div class="card">
					<div class="card-title">
						<div class="font-title font-light font-grey">Price in BAHT : </div>
						<div class="font-display1 font-light">BAHT {{ Exchanger\Price::getBAHTSell() }}</div>
					</div>
					<div class="card-action">
						<button class="flat-button primary m-r-8 ripple" data-dialog="#baht-sell">Change Price</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="dialog" id="usd-buy">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Buy in USD</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value="1">
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Buy (USD)" value="{{ Exchanger\Price::getUSDBuy() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="dialog" id="myr-buy">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Buy in MYR</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value="3">
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Buy (USD)" value="{{ Exchanger\Price::getMYRBuy() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="dialog" id="baht-buy">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Buy in BAHT</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value="5">
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Buy (USD)" value="{{ Exchanger\Price::getBAHTBuy() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="dialog" id="idr-buy">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Buy in IDR</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value="7">
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Buy (USD)" value="{{ Exchanger\Price::getIDRBuy() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="dialog" id="usd-sell">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Sell in USD</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value="2">
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Sell (USD)" value="{{ Exchanger\Price::getUSDSell() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="dialog" id="myr-sell">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Sell in MYR</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value="4">
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Sell (USD)" value="{{ Exchanger\Price::getMYRSell() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="dialog" id="baht-sell">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Sell in BAHT</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value=6>
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Sell (USD)" value="{{ Exchanger\Price::getBAHTSell() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="dialog" id="idr-sell">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Change Customer Sell in IDR</div>
			</div>
			<form action="/panel/change-price" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<input type="hidden" name="price_id" value=8>
				<div class="dialog-content">
					<input type="text" name="price" placeholder="Customer Sell (USD)" value="{{ Exchanger\Price::getIDRSell() }}" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="dialog" id="add-utoken">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Add Utoken</div>
			</div>
			<form action="/panel/add-utoken" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<div class="dialog-content">
					<input type="text" name="value" placeholder="UToken to Add to System" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Confirm</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="dialog" id="sub-utoken">
		<div class="dialog-inner">
			<div class="dialog-header">
				<div class="font-title">Add Utoken</div>
			</div>
			<form action="/panel/sub-utoken" method="post">
				<input type="hidden" name="_token" value="{{ $csrf_token }}">
				<div class="dialog-content">
					<input type="text" name="value" placeholder="UToken to Substitute from System" data-normal-input>
				</div>
				<div class="dialog-footer">
					<div class="pull-right">
						<button class="raised-button primary ripple" type="submit">Confirm</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endif
@stop



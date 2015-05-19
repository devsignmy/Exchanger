<?php namespace Exchanger\Http\Controllers;

use Hash;
use Auth;
use Exchanger\User;
use Exchanger\Price;
use Illuminate\Http\Request;

use Illuminate\Routing\Controller;

class PanelController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->data["navigation_menu"] = "panel";
		$this->data["csrf_token"] = csrf_token();
	}

	public function getIndex() {
		return view("panel.index", $this->data);
	}

	public function getLogout() {
		Auth::logout();

		return redirect()->to("login");
	}

	public function postChangePrice(Request $request) {
//		echo "ok";
		$price_id = $request->input("price_id");
		if ($price_id == 1) {
			Price::setUSDBuy($request->input("price"));
		} else if ($price_id == 3) {
			Price::setMYRBuy($request->input("price"));
		} else if ($price_id == 5) {
			Price::setBAHTBuy($request->input("price"));
		} else if ($price_id == 7) {
			Price::setIDRBuy($request->input("price"));
		} else if ($price_id == 2) {
			Price::setUSDSell($request->input("price"));
		} else if ($price_id == 4) {
			Price::setMYRSell($request->input("price"));
		} else if ($price_id == 6) {
			Price::setBAHTSell($request->input("price"));
		} else if ($price_id == 8) {
			Price::setIDRSell($request->input("price"));
		}

		return redirect()->back()->with("success", "Succesfully change price");
	}

}

<?php namespace Exchanger\Http\Controllers;

use Hash;
use Auth;
use Exchanger\User;
use Exchanger\Bank;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

class PanelBankController extends Controller {
	protected $data;

	public function __construct()
	{
		$this->middleware('auth');
		$this->data["csrf_token"] = csrf_token();
		$this->data["navigation_menu"] = "bank";
		$this->data["loginuser"] = User::find(Auth::user()->id);
	}

	public function getIndex(Request $request, $page = 1) {
		$banks = Bank::all();
		$bankCount = Bank::count();
		$pageTotal = intval($bankCount / 10);
		$disableLeft = true;
		$disableRight = true;

		if (($bankCount % 10) > 0) {
			$pageTotal =  $pageTotal + 1 ;
		}

		if ($page > 1) {
			$disableLeft = false;
		}

		if ($page < $pageTotal) {
			$disableRight = false;
		}

		if ($pageTotal == 0) {
			$pageTotal = 1;
		}

		$this->data["page"]["number"] = $page;
		$this->data["page"]["total"] = $pageTotal;
		$this->data["page"]["left_arrow"] = $disableLeft;
		$this->data["page"]["right_arrow"] = $disableRight;
		$this->data["banks"] = $banks;
		return view("panel.bank.index", $this->data);
	}


}

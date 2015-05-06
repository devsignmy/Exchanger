<?php namespace Exchanger\Http\Controllers;

use Request;
use Hash;
use Auth;
use Exchanger\User;

use Illuminate\Routing\Controller;

class PanelController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex() {
		return view("panel.index");
	}

	public function getLogout() {
		Auth::logout();

		return redirect()->to("login");
	}

}

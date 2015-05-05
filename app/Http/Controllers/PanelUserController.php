<?php namespace Exchanger\Http\Controllers;

use Request;
use Hash;
use Auth;
use Exchanger\User;
use Illuminate\Routing\Controller;

class PanelUserController extends Controller {
	protected $data;

	public function __construct()
	{
		$this->middleware('auth');
		$this->data["csrf_token"] = csrf_token();
	}

	public function getIndex($page = 1) {
		$userCount = User::where("access_level", 1)->count();

		$pageTotal = intval($userCount / 10);
		$disableLeft = true;
		$disableRight = true;

		if (($userCount % 10) > 0) {
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

		$this->data["users"] = User::where("access_level", 1)->get();
		$this->data["page"]["number"] = $page;
		$this->data["page"]["total"] = $pageTotal;
		$this->data["page"]["left_arrow"] = $disableLeft;
		$this->data["page"]["right_arrow"] = $disableRight;
		return view("user.index", $this->data);
	}

	public function getAdd() {
		return view("user.add", $this->data);
	}

	public function getDelete(Request $request, $id) {
		$user = User::find($id);

		if (is_null($user)) {
			return redirect()->back();
		}

		$user->delete();

		return redirect()->back();
	}

}

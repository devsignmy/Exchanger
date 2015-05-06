<?php namespace Exchanger\Http\Controllers;

use Hash;
use Auth;
use Exchanger\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Crypt;

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

	public function postAdd(Request $request) {
		$user = new User();
		$user->firstname = $request->input("firstname");
		$user->lastname = $request->input("lastname");
		$user->username = $request->input("username");
		$user->email = $request->input("email");
		$user->phone_number = $request->input("phone_number");
		$user->password = Hash::make($request->input("firstname"));
		$user->access_level = 1;

		$user->save();

		return redirect()->to("/panel/user/");
	}

	public function getDelete(Request $request, $id) {
		$user = User::find($id);

		if (is_null($user)) {
			return redirect()->back();
		}

		$user->delete();

		return redirect()->back();
	}

	public function getEdit($id) {
		$user = User::find($id);

		if (is_null($user)) {
			return redirect()->back();
		}

		$this->data["user"] = $user;
		$this->data["encrypt_id"] = Crypt::encrypt($user->id);
		return view("user.edit", $this->data);

	}

	public function postEdit(Request $request) {
		$user = User::find(Crypt::decrypt($request->input("user_id")));

		if (is_null($user)) {
			return redirect()->back();
		}

		$user->firstname = $request->input("firstname");
		$user->lastname = $request->input("lastname");
		$user->username = $request->input("username");
		$user->email = $request->input("email");
		$user->phone_number = $request->input("phone_number");
		$user->access_level = 1;

		$user->save();

		return redirect()->back();
	}

	public function getPassword(Request $request, $id) {
		$user = User::find($id);

		$this->data['encrypted_id'] = Crypt::encrypt($user->id);
		return view("user.password", $this->data);
		// $_SERVER['HTTP_REFERER'];
	}

	public function postPassword(Request $request) {
		$user = User::find(Crypt::decrypt($request->user_id));

		if (Hash::check($request->input("old_password"), $user->password) && $request->input("password") == $request->input("confirm_password")) {
			$user->password = $request->input("password");
			$user->save();
			return redirect()->back();
		} 

		return redirect()->back();
	}

}

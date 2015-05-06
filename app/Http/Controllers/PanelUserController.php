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

	/**
	 * [Route GET User Manager Index]
	 * @param  [Request] Request $request 
	 * @param  [Integer] [$page = 1]      [[Page Number]]
	 */
	
	public function getIndex(Request $request, $page = 1) {
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

	/**
	 * [[Route GET User Manager Add]]
	 */
	
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
			return redirect()->back()->with("error", "Cannot find user data");
		}

		$user->delete();

		return redirect()->back()->with("success", 'Succefully delete. Restore user back <a href="/panel/user/restore/'. $user->id .'">here</a>');
	}
	
	public function getRestore(Request $request, $id) {
		$user = User::onlyTrashed()->find($id);
		
		if (is_null($user)) {
			return redirect()->back()->with("error", "Cannot find user data");
		}
		
		$user->restore();
		
		return redirect()->back()->with("success", "Successfully restore user's data with username : ". $user->username);
	}

	public function getEdit($id) {
		$user = User::find($id);

		if (is_null($user)) {
			return redirect()->back()->with("error", "Cannot find user data");
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

		return redirect()->back()->with('success', 'Successfully update user details');
	}

	public function getPassword(Request $request, $id) {
		$user = User::find($id);

		$this->data['encrypted_id'] = Crypt::encrypt($user->id);
		return view("user.password", $this->data);
	}

	public function postPassword(Request $request) {
		$user = User::find(Crypt::decrypt($request->user_id));

		if (Hash::check($request->input("old_password"), $user->password) && $request->input("password") == $request->input("confirm_password")) {
			$user->password = $request->input("password");
			$user->save();
			return redirect()->back()->with("success", "Successfully change password");
		} 

		return redirect()->back()->with("error","There are error when changing the user's password");
	}

}

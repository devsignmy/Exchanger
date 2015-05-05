<?php namespace Exchanger\Http\Controllers;

use Request;
use Hash;
use Auth;
use Exchanger\User;
use Exchanger\BitAnd;
use Session;
use Illuminate\Routing\Controller;

class PublicController extends Controller {

	protected $data;

	public function __construct()
	{
		$this->middleware('guest');
		$this->data["csrf_token"] = csrf_token();
	}

	public function getIndex() {
		echo "nizul";
	}

	public function getLogin() {
		return view("login", $this->data);
	}

	public function postLogin() {
		if (Auth::attempt(['username' => Request::input("username_email"), 'password' => Request::input("password")], Request::input("remember_computer"))) {
		    $this->setLoginSession();
		    return redirect()->to("panel");
		} else {
			if (Auth::attempt(['email' => Request::input("username_email"), 'password' => Request::input("password")], Request::input("remember_computer")))  {
				$this->setLoginSession();
				return redirect()->to("panel");
			}
		}

		return redirect()->back();
	}

	public function postSignup() {
		$user = new User();
		$user->firstname = Request::input("firstname");
		$user->lastname = Request::input("lastname");
		$user->username = Request::input("username");
		$user->email = Request::input("email");
		$user->password = Hash::make(Request::input("password"));
		$user->access_level = 1;
		$user->save();

		return redirect()->to("panel");
	}

	private function setLoginSession() {
		$user = User::find(Auth::user()->id);

		if (BitAnd::check($user->access_level, env("ACC_SUPER"))) {
			Session::put("access_value", 1);
		} else {
			if (BitAnd::check($user->access_level, env("ACC_ADMIN"))) {
				Session::put("access_value", 2);
			} else {
				if (BitAnd::check($user->access_level, env("ACC_NUSER"))) {
					Session::put("access_value", 3);
				}
			}
		} 
	}

}

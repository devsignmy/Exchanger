<?php namespace Exchanger\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Exchanger\Country;
use Session;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

	public function __construct() {
		if (!Session::has("browse_country_id")) {
			$json = file_get_contents("http://ip-api.com/json"); // this WILL do an http request for you
			$data = json_decode($json);

			$country = Country::where("name", $data->country)->first();
			$id = $country->id;
			if (is_null($country)) {
				$id = 0;
			}

			Session::put("browse_country_id", $country->id);
		}
	}
}

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
			$json = file_get_contents("http://api.hostip.info/get_json.php?ip=12.215.42.19"); // this WILL do an http request for you
			$data = json_decode($json);

			$country = Country::where("name", $data->country_name)->first();
			$id = 0;
			if (is_null($country)) {
				$id = 0;
			} else {
				$id = $country->id;
			}

			Session::put("browse_country_id", $id);
		}
	}
}

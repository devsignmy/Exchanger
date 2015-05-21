<?php namespace Exchanger;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
	protected $table = "transaction";
	protected $fillable = ["*"];

	public static function getUToken() {
		$total = Price::sum("in_value")->sub("in_value");

		return $total;
	}
}

<?php namespace Exchanger;

use Illuminate\Database\Eloquent\Model;

class Price extends Model {
	protected $table = "prices";
	protected $fillable = ["data"];

	// get buy from company

	public static function getUSDbuy() {
		return number_format(Price::find(1)->data, 3);
	}

	public static function getMYRbuy() {
		return number_format(Price::find(3)->data, 3);
	}

	public static function getBAHTbuy() {
		return number_format(Price::find(5)->data, 3);
	}

	public static function getIDRbuy() {
		return number_format(Price::find(7)->data);
	}

	// get sell from company

	public static function getUSDSell() {
		return number_format(Price::find(2)->data, 3);
	}

	public static function getMYRSell() {
		return number_format(Price::find(4)->data, 3);
	}

	public static function getBAHTSell() {
		return number_format(Price::find(6)->data, 3);
	}

	public static function getIDRSell() {
		return number_format(Price::find(8)->data);
	}

	// set buy from company
	public static function setUSDbuy($data) {
		$price = Price::find(1);
		$price->data = $data;
		$price->save();
	}

	public static function setMYRbuy($data) {
		$price = Price::find(3);
		$price->data = $data;
		$price->save();
	}

	public static function setBAHTbuy($data) {
		$price = Price::find(5);
		$price->data = $data;
		$price->save();
	}

	public static function setIDRbuy($data) {
		$price = Price::find(7);
		$price->data = $data;
		$price->save();
	}

	public static function setUSDsell($data) {
		$price = Price::find(2);
		$price->data = $data;
		$price->save();
	}

	public static function setMYRsell($data) {
		$price = Price::find(4);
		$price->data = $data;
		$price->save();
	}

	public static function setBAHTsell($data) {
		$price = Price::find(6);
		$price->data = $data;
		$price->save();
	}

	public static function setIDRsell($data) {
		$price = Price::find(8);
		$price->data = $data;
		$price->save();
	}
}

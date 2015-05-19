<?php namespace Exchanger;

use Illuminate\Database\Eloquent\Model;
use Exchanger\Country;

class Bank extends Model {
	protected $table = "banks";
	protected $fillable = ["*"];

	public function country() {
		return Country::find($this->country_id)->name;
	}
}

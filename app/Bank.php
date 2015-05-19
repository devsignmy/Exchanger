<?php namespace Exchanger;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model {
	protected $table = "banks";
	protected $fillable = ["*"];

	public function country() {
		echo "nizul";
	}
}

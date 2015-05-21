<?php namespace Exchanger;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model {
	protected $table = "transactions";
	protected $fillable = ["*"];

	public static function getUToken() {
		$in = Transaction::sum("in_value");
		$out = Transaction::sum("out_value");

		return $in - $out;
	}

	public static function add($value) {
		$trans = new Transaction();
		$trans->in_value = $value;
		$trans->save();
	}

	public static function sub($value) {
		$trans = new Transaction();
		$trans->out_value = $value;
		$trans->save();
	}
}

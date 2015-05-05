<?php namespace Exchanger;

class BitAnd {
	public static function check($x, $y) {
		$z = $x & $y;
		if ( $z == $y) {
			return true;
		} 

		return false;
	}
}
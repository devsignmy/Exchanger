<?php namespace Exchanger;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;
	protected $table = 'users';
	use SoftDeletes;

	protected $fillable = ['name', 'email', 'password'];
	protected $hidden = ['password', 'remember_token'];
	protected $dates = ['deleted_at'];

	public function fullname() {
		return $this->firstname . " " . $this->lastname;
	}

}

/*
	ACCESS LEVEL

	* 1 = Normal user
	* 2 = Administrator
	* 4 = Super
*/

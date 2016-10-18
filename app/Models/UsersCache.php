<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersCache
 */
class UsersCache extends Model
{
    protected $table = 'users_cache';

    protected $primaryKey = 'cache_id';

	public $timestamps = true;

    protected $fillable = [
        'user_login',
        'user_pass',
        'user_nicename',
        'user_email',
        'user_url',
        'user_registered',
        'user_activation_key',
        'user_status',
        'display_name'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getUserLogin() {
		return $this->user_login;
	}

	/**
	 * @return mixed
	 */
	public function getUserPass() {
		return $this->user_pass;
	}

	/**
	 * @return mixed
	 */
	public function getUserNicename() {
		return $this->user_nicename;
	}

	/**
	 * @return mixed
	 */
	public function getUserEmail() {
		return $this->user_email;
	}

	/**
	 * @return mixed
	 */
	public function getUserUrl() {
		return $this->user_url;
	}

	/**
	 * @return mixed
	 */
	public function getUserRegistered() {
		return $this->user_registered;
	}

	/**
	 * @return mixed
	 */
	public function getUserActivationKey() {
		return $this->user_activation_key;
	}

	/**
	 * @return mixed
	 */
	public function getUserStatus() {
		return $this->user_status;
	}

	/**
	 * @return mixed
	 */
	public function getDisplayName() {
		return $this->display_name;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserLogin($value) {
		$this->user_login = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserPass($value) {
		$this->user_pass = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserNicename($value) {
		$this->user_nicename = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserEmail($value) {
		$this->user_email = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserUrl($value) {
		$this->user_url = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserRegistered($value) {
		$this->user_registered = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserActivationKey($value) {
		$this->user_activation_key = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setUserStatus($value) {
		$this->user_status = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setDisplayName($value) {
		$this->display_name = $value;
		return $this;
	}



}
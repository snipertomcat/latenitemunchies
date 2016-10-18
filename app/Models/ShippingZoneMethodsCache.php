<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingZoneMethodsCache
 */
class ShippingZoneMethodsCache extends Model
{
    protected $table = 'shipping_zone_methods_cache';

    public $timestamps = true;

    protected $fillable = [
        'instance_id',
        'zone_id',
        'method_id',
        'method_order',
        'is_enabled'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getInstanceId() {
		return $this->instance_id;
	}

	/**
	 * @return mixed
	 */
	public function getZoneId() {
		return $this->zone_id;
	}

	/**
	 * @return mixed
	 */
	public function getMethodId() {
		return $this->method_id;
	}

	/**
	 * @return mixed
	 */
	public function getMethodOrder() {
		return $this->method_order;
	}

	/**
	 * @return mixed
	 */
	public function getIsEnabled() {
		return $this->is_enabled;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setInstanceId($value) {
		$this->instance_id = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setZoneId($value) {
		$this->zone_id = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setMethodId($value) {
		$this->method_id = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setMethodOrder($value) {
		$this->method_order = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setIsEnabled($value) {
		$this->is_enabled = $value;
		return $this;
	}



}
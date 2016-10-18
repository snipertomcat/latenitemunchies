<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingZonesCache
 */
class ShippingZonesCache extends Model
{
    protected $table = 'shipping_zones_cache';

    public $timestamps = true;

    protected $fillable = [
        'zone_id',
        'zone_name',
        'zone_order'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getZoneId() {
		return $this->zone_id;
	}

	/**
	 * @return mixed
	 */
	public function getZoneName() {
		return $this->zone_name;
	}

	/**
	 * @return mixed
	 */
	public function getZoneOrder() {
		return $this->zone_order;
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
	public function setZoneName($value) {
		$this->zone_name = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setZoneOrder($value) {
		$this->zone_order = $value;
		return $this;
	}



}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ShippingZoneLocationsCache
 */
class ShippingZoneLocationsCache extends Model
{
    protected $table = 'shipping_zone_locations_cache';

    public $timestamps = true;

    protected $fillable = [
        'location_id',
        'zone_id',
        'location_code',
        'location_type'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getLocationId() {
		return $this->location_id;
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
	public function getLocationCode() {
		return $this->location_code;
	}

	/**
	 * @return mixed
	 */
	public function getLocationType() {
		return $this->location_type;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setLocationId($value) {
		$this->location_id = $value;
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
	public function setLocationCode($value) {
		$this->location_code = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setLocationType($value) {
		$this->location_type = $value;
		return $this;
	}



}
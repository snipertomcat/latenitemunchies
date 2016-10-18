<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderItemsCache
 */
class OrderItemsCache extends Model
{
    protected $table = 'order_items_cache';

    public $timestamps = true;

    protected $fillable = [
        'order_item_id',
        'order_item_name',
        'order_item_type',
        'order_id'
    ];

    protected $guarded = [];

    
	/**
	 * @return mixed
	 */
	public function getOrderItemId() {
		return $this->order_item_id;
	}

	/**
	 * @return mixed
	 */
	public function getOrderItemName() {
		return $this->order_item_name;
	}

	/**
	 * @return mixed
	 */
	public function getOrderItemType() {
		return $this->order_item_type;
	}

	/**
	 * @return mixed
	 */
	public function getOrderId() {
		return $this->order_id;
	}


    
	/**
	 * @param $value
	 * @return $this
	 */
	public function setOrderItemId($value) {
		$this->order_item_id = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setOrderItemName($value) {
		$this->order_item_name = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setOrderItemType($value) {
		$this->order_item_type = $value;
		return $this;
	}

	/**
	 * @param $value
	 * @return $this
	 */
	public function setOrderId($value) {
		$this->order_id = $value;
		return $this;
	}



}
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

	protected $meta = [];

	protected $tax;

	protected $itemMetas = [];

	public function setItemMeta(ItemMeta $itemMeta)
	{
		$this->hasOne('item_meta');
		$this->itemMetas[] = $itemMeta;
	}

	/**
	 * Sets the inverse of a Many To One relationship
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function orderItemmetaCache()
	{
		//specify a one to many (inverse) relationship with key and foreign keys set to 'order_item_id'
		return $this->hasMany('App\Models\OrderItemmetaCache', 'order_item_id', 'order_item_id');
	}
    
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

	public function addMeta($meta)
	{
		$this->meta[] = $meta;
	}

	public function addTax($tax)
	{
		$this->tax = $tax;
	}

	public function getItemMetas()
	{
		return $this->itemMetas;
	}

}
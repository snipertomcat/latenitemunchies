<?php
/**
 * Created by: Jesse Griffin
 * Date: 11/8/2016
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    private $orderItems = [];

    public function addOrderItems(OrderItemsCache $orderItem)
    {
        $this->orderItems[] = $orderItem;
    }

    public function getOrderItems()
    {
        return $this->orderItems;
    }

    public function __set($key, $val) {
        $this->attributes[$key] = $val;
    }

    public function __get($key) {
        if ($this->getAttribute($key) !== false) {
            return $this->getAttribute($key);
        } else {
            return null;
        }
    }
}
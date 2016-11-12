<?php
/**
 * Created by: Jesse Griffin
 * Date: 11/8/2016
 */

namespace App\Models\Repository;


use App\Models\Customer;
use Doctrine\ORM\EntityRepository;

class StoreRepository
{
    protected $orderItems = [];

    protected $orderItemmeta = [];

    protected $customerData = [];

    public function getOrderItems($orderId)
    {
        $recordExists = self::checkDuplicateOrder($orderId);

        if (!$recordExists) {

            //Query the wordpress db to find order information about the passed in orderId:
            $externalOrderItem = \DB::connection('mysql_wordpress')->select('select * from wp_zs7hab2d9c_woocommerce_order_items where order_id = ?', [$orderId]);

            return $externalOrderItem;
        }
    }

    public function getOrderItemmeta($orderItemId)
    {
        $externalOrderItemmeta = \DB::connection('mysql_wordpress')->select('select * from wp_zs7hab2d9c_woocommerce_order_itemmeta where order_item_id = ?', [$orderItemId]);

        foreach ($externalOrderItemmeta as $orderItemMeta) {
            $properties = [
                'meta_id' => $orderItemMeta->meta_id,
                'order_item_id' => $orderItemMeta->order_item_id,
                'meta_key' => $orderItemMeta->meta_key,
                'meta_value' => $orderItemMeta->meta_value
            ];

            //create the orderItemmeta records in local database:
            $orderItemmeta[] = OrderItemmetaCache::create($properties);
        }

        return $orderItemmeta;
    }

    public function getCustomerData($userId)
    {
        $customerData = \DB::connection('mysql_wordpress')->select('select * from wp_zs7hab2d9c_usermeta where user_id = ?', [$userId]);

        $properties = [];

        foreach ($customerData as $key => $val) {
            $properties[$key] = $val;
        }

        //create the Customer record in local database:
        $customer = Customer::create($properties);

        return $properties;
    }

    /**
     * Calls private methods to compile all order items including their respective item meta data. Acts more as a
     * facade to the functionality included with this repository.
     * @param $orderId
     */
    public function compileOrders($orderId)
    {
        $orderItems = $this->getOrderItems($orderId);
    }

    /**
     * Checks if there is already a record in order_item_cache with the same order_id as the one passed in.
     * @param $orderId
     * @return bool
     */
    private static function checkDuplicateOrder($orderId)
    {
        //initialize a boolean flag:
        $recordExists = false;

        //Check if the order_id exists:
        $existingRecords = \DB::connection('mysql')->select('select count(id) as order_count from order_items_cache where order_id = ?', [$orderId]);

        if ($existingRecords[0]->order_count > 0) {
            $recordExists = true;
        }

        return $recordExists;

    }
}
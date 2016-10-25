<?php

namespace App\Models\Managers;

use App\Models\LNM\OrderItems;
use App\Models\OrderItemmetaCache;
use App\Models\OrderItemsCache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderManager
{

    public function __construct()
    {
    }

    public static function createOrder($orderId)
    {
        $recordExists = false;

        //Check if the order_id exists:
        $existingRecords = \DB::connection('mysql')->select('select count(id) as order_count from order_items_cache where order_id = ?', [$orderId]);

        if ($existingRecords[0]->order_count > 0) {
            $recordExists = true;
        }

        if (!$recordExists) {

            //Query the wordpress db to find order information about the passed in orderId:
            $externalOrderItem = \DB::connection('mysql_wordpress')->select('select * from wp_zs7hab2d9c_woocommerce_order_items where order_id = ?', [$orderId]);

            foreach ($externalOrderItem as $orderItem) {
                //set some properties for each record:
                $properties = [
                    'order_item_id' => $orderItem->order_item_id,
                    'order_item_name' => $orderItem->order_item_name,
                    'order_item_type' => $orderItem->order_item_type,
                    'order_id' => $orderItem->order_id
                ];
                //save the order_item_ids for later processing:
                $orderItemIds[] = $orderItem->order_item_id;
                //create a local record of the order:
                OrderItemsCache::create($properties);
            }

            //process all order_item_ids:
            foreach ($orderItemIds as $orderItemId) {
                $externalOrderItemmeta = \DB::connection('mysql_wordpress')->select('select * from wp_zs7hab2d9c_woocommerce_order_itemmeta where order_item_id = ?', [$orderItemId]);

                foreach ($externalOrderItemmeta as $orderItemMeta) {
                    $properties = [
                        'meta_id' => $orderItemMeta->meta_id,
                        'order_item_id' => $orderItemMeta->order_item_id,
                        'meta_key' => $orderItemMeta->meta_key,
                        'meta_value' => $orderItemMeta->meta_value
                    ];
                    //create local record of each items meta data:
                    OrderItemmetaCache::create($properties);
                }
            }

        }
    }
}
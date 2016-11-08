<?php

namespace App\Models\Managers;

use App\Models\LNM\OrderItems;
use App\Models\OrderItemmetaCache;
use App\Models\OrderItemsCache;
use App\Models\Virtual\Order;
use App\Models\Virtual\Tax;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderManager
{

    public function __construct()
    {
    }

    /**
     *
     * @param $orderId
     */
    public static function createOrder($orderId)
    {
        $recordExists = self::checkDuplicateOrder($orderId);

        if (!$recordExists) {

            /** @var array $localOrderItems: Holds the newly created OrderItemCache objects */
            $localOrderItems = [];

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
                //create a local record of the order:
                $localOrderItem = OrderItemsCache::create($properties);
                //print_r($localOrderItem);
                //store the line items, tax and fee records:
                $orderItems[$orderItem->order_item_type] = $localOrderItem;
            }
            //echo "<pre>";print_r($orderItems);exit;
            //process all li
            foreach ($orderItems as $orderItem) {
                $orderItemId = $orderItem->order_item_id;
                $externalOrderItemmeta = \DB::connection('mysql_wordpress')->select('select * from wp_zs7hab2d9c_woocommerce_order_itemmeta where order_item_id = ?', [$orderItemId]);

                foreach ($externalOrderItemmeta as $orderItemMeta) {
                    $properties = [
                        'meta_id' => $orderItemMeta->meta_id,
                        'order_item_id' => $orderItemMeta->order_item_id,
                        'meta_key' => $orderItemMeta->meta_key,
                        'meta_value' => $orderItemMeta->meta_value
                    ];

                    $newItemMeta = OrderItemmetaCache::create($properties);

                    if (strpos($orderItemMeta->meta_key, '_') === 0) {
                        //create local record of each items meta data:
                        $lineItems[] = $newItemMeta;

                        $newVirutalObject = new Order();
                        $newVirutalObject->addVisible($properties);
                        print_r($newVirutalObject);
                    } else {
                        //its a tax line, create tax object:
                        $newItemTax = new Tax();
                        $newItemTax->create($orderItemMeta);
                        print_r($newItemTax);
                    }

                    //echo "<pre>" ; print_r($newVirutalObject);
                }
            }

            //hydrate all values from meta_key/meta_value into the meta object as properties:
            //$metaObjects = self::hydrateMeta($newItemMeta);

            //echo "<pre>"; print_r($metaObjects);
        }
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

    /**
     * Sets the properties of this object based on the pased in $itemmetaCache to its respective
     * 'meta_key' and 'meta_value' columns.
     * @param $orderMetaData
     * @return array
     */
    public static function hydrateMeta($orderMetaData = [])
    {
        if (!empty($orderMetaData)) {
            foreach ($orderMetaData as $itemMeta) {
                //if there is a starting underscore at the start of the meta_key, it is a line_item
                if (strpos($itemMeta->meta_key, '_') === 0) {
                    $meta_key = $itemMeta->meta_key;
                    $meta_value = $itemMeta->meta_value;
                    $itemMeta->{$meta_key} = $meta_value;
                }
                $newMetaList[] = $itemMeta;
            }
        }
        return $newMetaList;
    }
}
<?php

namespace App\Models\Facade;

use App\Models\Repository\StoreRepository;

class OrderFacade
{

    protected $storeRepository;

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
    }

    /**
     * Retrieves an array of order items from the WPDB (via StoreRepository), and creates a local entity
     * OrderItemsCache and persists it to the local database.
     * @param $orderId
     * @return array
     */
    public function createOrder($orderId)
    {
        $orderItems = [];

        //retrieve the order items for the related order id:
        $externalItems = $this->storeRepository->getOrderItems($orderId);

        foreach ($externalItems as $orderItem) {
            //set some properties for each record:
            $properties = [
                'order_item_id' => $orderItem->order_item_id,
                'order_item_name' => $orderItem->order_item_name,
                'order_item_type' => $orderItem->order_item_type,
                'order_id' => $orderItem->order_id
            ];
            //create a local record of the order:
            $orderItems[] = OrderItemsCache::create($properties);
        }

        return $orderItems;
    }

    public function createOrderMeta($orderItems = [])
    {
        if (count($orderItems) !== 0) {
            foreach ($orderItems as $orderItem) {
                $orderItemId = $orderItem->order_item_id;

                //get the meta data for each passed in item:
                $externalOrderItemmeta = $this->storeRepository->getOrderItemmeta($orderItemId);

                foreach ($externalOrderItemmeta as $orderItemMeta) {
                    $properties = [
                        'meta_id' => $orderItemMeta->meta_id,
                        'order_item_id' => $orderItemMeta->order_item_id,
                        'meta_key' => $orderItemMeta->meta_key,
                        'meta_value' => $orderItemMeta->meta_value
                    ];

                    $newItemMeta[] = OrderItemmetaCache::create($properties);

                    //echo "<pre>" ; print_r($newVirutalObject);
                }
            }
            return $newItemMeta;
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
}
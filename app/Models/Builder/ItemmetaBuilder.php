<?php

namespace App\Models\Builder;

use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderItemmetaCache;
use App\Models\ItemMeta;

class ItemmetaBuilder implements BuilderInterface
{
    /** @var array OrderItemmetaCache */
    protected $itemsMetaCache = [];

    public function build()
    {
        // TODO: Implement build() method.
    }

    public function addOrderItemmetaCache(OrderItemmetaCache $orderItemmetaCache)
    {
        $this->itemsMetaCache[] = $orderItemmetaCache;
    }

    /**
     * Main build process
     *
     * @return ItemMeta
     */
    public function buildItemMeta()
    {
        if (count($this->itemsMetaCache) !== 0) {
            $properties = [];

            foreach ($this->itemsMetaCache as $meta) {
                $properties[$meta->meta_key] = $meta->meta_value;
            }

            $itemMeta = ItemMeta::create($properties);

            return $itemMeta;
        }
    }
}
<?php

namespace App\Models\Facade;

use App\Models\Builder\BuilderInterface;
use App\Models\Builder\OrderBuilder;
use App\Models\Repository\StoreRepository;

class DeliveryFacade
{
    /** @var  StoreRepository $storeRepository */
    protected $storeRepository;

    /** @var array $builders */
    protected $builders = [];

    public function __construct(StoreRepository $storeRepository)
    {
        $this->storeRepository = $storeRepository;
        array_add($this->builders, 'order', '');
        array_add($this->builders, 'delivery',  '');
        array_add($this->builders, 'itemmeta', '');
    }

    public function getStoreData($orderId)
    {

    }

    public function addBuilder($name, BuilderInterface $builder)
    {
        if (array_key_exists($name, $this->builders)) {
            $this->builders[$name] = $builder;
        }
    }

    /**
     * This method utilizes all the added builder classes and creates a stand-alone delivery object.
     */
    public function createDelivery($orderId)
    {
        if (isset($this->builders['order'])) {
            /** @var OrderBuilder $orderBuilder */
            $orderBuilder = $this->builders['order'];
        }
    }


}
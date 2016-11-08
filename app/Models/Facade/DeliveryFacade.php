<?php

namespace App\Models\Facade;

use App\Models\Builder\BuilderInterface;

class DeliveryFacade
{
    /** @var  StoreRepository $storeRepository */
    protected $storeRepository;

    /** @var array $builders */
    protected $builders = [];

    public function getStoreData($orderId)
    {

    }

    public function addBuilder($name, BuilderInterface $builder)
    {
        $this->builders[$name] = $builder;
    }

    /**
     * This method utilizes all the added builder classes and creates a stand-alone delivery object.
     */
    public static function createDelivery()
    {

    }
}
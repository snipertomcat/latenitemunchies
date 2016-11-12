<?php

namespace App\Models\Builder;

use App\Customer;
use App\Models\Order;
use App\Models\Customer;

class OrderBuilder implements BuilderInterface
{
    protected $orderItems;

    protected $orderItemmeta;

    protected $customerData;

    public function build()
    {

    }

    public function setOrderData($orderData)
    {
        $this->orderData = $orderData;
    }

    public function setCustomerData($customerData)
    {
        $this->customerData = $customerData;
    }

    public function setItemmetaData($itemmetaData)
    {
        $this->orderItemmeta = $itemmetaData;
    }

    /**
     * Creates Order object from raw data
     *
     * @return Order $order
     * @throws \Exception
     */
    public function buildOrder()
    {
        if ($this->orderData) {
            $order = Order::create($this->orderData);
        } else {
            throw new \Exception('Order data is not set -- cannot build Order object');
        }

        return $order;
    }

    /**
     * Creates Customer object from raw data
     *
     * @return Customer $customer
     * @throws \Exception
     */
    public function buildCustomer()
    {
        if ($this->customerData) {
            $customer = Customer::create($this->customerData);
        } else {
            throw new \Exception('Customer data is not set -- cannot build Order object');
        }

        return $customer;
    }
}
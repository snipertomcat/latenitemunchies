<?php

namespace App\Models\Builder;

use App\Customer;
use App\Models\Order;
use App\Models\Customer;

class OrderBuilder implements BuilderInterface
{
    protected $orderData;

    protected $customerData;

    public function build()
    {
        // TODO: Implement build() method.
    }

    public function setOrderData($orderData)
    {
        $this->orderData = $orderData;
    }

    public function setCustomerData($customerData)
    {
        $this->customerData = $customerData;
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
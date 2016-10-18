<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    private $id;

    private $customer;

    private $driver;

    private $order;

    private $route;

    public function __construct()
    {

    }

}

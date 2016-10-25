<?php

namespace App\Http\Controllers\Api;


use App\Models\Managers\OrderManager;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Symfony\Component\HttpFoundation\JsonResponse;

class ApiController extends Controller
{
    /** @var \Illuminate\Database\Eloquent\Builder  */
    protected $builder;

    /** @var  OrderManager */
    protected $orderManager;

    public function __construct(\Illuminate\Database\Eloquent\Builder $builder, OrderManager $orderManager)
    {
        //parent::__construct();
        $this->builder = $builder;
        $this->orderManager = $orderManager;
    }

    public function createOrderFromId($order_id)
    {
        $this->orderManager->createOrder($order_id);

        return new JsonResponse(['success'=>true, 'message'=>'Successfully created new local order']);
    }
}

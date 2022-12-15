<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Response;


class OrderController extends Controller
{
    protected OrderService $service;


    public function __construct(OrderService $orderService)
    {
        $this->service = $orderService;
    }

    /**
     * @param CreateOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function createOrder(CreateOrderRequest $request):Response
    {
        $userId = $request->input('user_id');
        $products = $request->input('products');
        $order = $this->service->createOrder($userId, $products);
        return response(['success' => true, 'order' => $order], 200);
    }
}

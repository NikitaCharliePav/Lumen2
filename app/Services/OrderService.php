<?php

namespace App\Services;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderService
{
    /**
     * @param string $userId
     * @param array $products
     * @return Order
     */
    public function createOrder(string $userId, array $products)
    {
        return DB::transaction(function() use($userId, $products)
        {
            $order = new Order();
            $order->setAttribute('user_id', $userId);
            $order->setAttribute('ordered_at', date('Y-m-d H:i:s'));
            $order->save();
            $this->createOrderProducts($products, $order->getAttribute('id'));

            return $order->load('orderProducts');
        });
    }

    /**
     * @param array $products
     * @param string $orderId
     * @return void
     * @throws \Exception
     */
    protected function createOrderProducts(array $products, string $orderId)
    {
        $products = array_unique($products);
        foreach ($products as $productId)
        {
            $product = Product::where('id', $productId)->where('published_at', '!=', null)->first();
            if (empty($product))
            {
                DB::rollback();
                throw new \Exception("Product id $productId not found", 404);
            }
            $orderProducts = new OrderProduct();
            $orderProducts->setAttribute('order_id', $orderId);
            $orderProducts->setAttribute('product_id', $productId);
            $orderProducts->save();
        }

    }
}

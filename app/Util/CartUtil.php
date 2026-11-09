<?php

/* Author: Cristian Bolaños */

namespace App\Util;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CartUtil
{
    public static function buildOrder(array $cart): Order
    {
        $items = new Collection;
        $products = Product::where('active', true)->whereIn('id', array_keys($cart))->orderBy('name')->get();
        foreach ($products as $product) {
            $item = new OrderItem;
            $item->setProduct($product);
            $item->setQuantity($cart[$product->getId()]);
            $item->setUnitPrice($product->getPrice());
            $item->setSubtotal($item->calculateSubtotal());
            $items->push($item);
        }

        $order = new Order;
        $order->setItems($items);
        $order->setSubtotal($order->calculateSubtotal());
        $order->setShippingCost($order->calculateShippingCost());
        $order->setTotalAmount($order->calculateTotal());

        return $order;
    }
}

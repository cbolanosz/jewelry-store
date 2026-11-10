<?php

/* Author: Pablo José Benítez Trujillo */

namespace Tests\Unit;

use App\Models\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function test_orders_under_one_thousand_have_standard_shipping(): void
    {
        $order = new Order;
        $order->setSubtotal(999.99);

        $this->assertSame(25.0, $order->calculateShippingCost());
    }
}

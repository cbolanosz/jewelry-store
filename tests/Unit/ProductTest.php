<?php

/* Author: Pablo José Benítez Trujillo */

namespace Tests\Unit;

use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_product_discount_is_calculated_with_two_decimal_places(): void
    {
        $product = new Product;
        $product->setPrice(1250.00);

        $this->assertSame(1062.50, $product->applyDiscount(15));
    }
}

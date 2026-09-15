<?php

/* Author: Diego Mesa */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * ORDER ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the order item primary key (id)
     * $this->attributes['quantity'] - int - contains the number of units of the product
     * $this->attributes['unit_price'] - float - contains the product price when the order was placed
     * $this->attributes['subtotal'] - float - contains the order item subtotal
     * $this->attributes['order_id'] - int - contains the associated order id
     * $this->attributes['product_id'] - int - contains the associated product id
     * $this->attributes['created_at'] - timestamp - contains the order item creation date
     * $this->attributes['updated_at'] - timestamp - contains the order item update date
     * $this->order - Order - contains the associated order
     * $this->product - Product - contains the associated product
     */
    protected $fillable = [
        'quantity',
        'unit_price',
        'subtotal',
        'order_id',
        'product_id',
    ];

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function setUnitPrice(float $unitPrice): void
    {
        $this->attributes['unit_price'] = $unitPrice;
    }

    public function setSubtotal(float $subtotal): void
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function setProductId(int $productId): void
    {
        $this->attributes['product_id'] = $productId;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function getUnitPrice(): float
    {
        return $this->attributes['unit_price'];
    }

    public function getSubtotal(): float
    {
        return $this->attributes['subtotal'];
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function getProductId(): int
    {
        return $this->attributes['product_id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order()->associate($order);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product()->associate($product);
    }

    public function calculateSubtotal(): float
    {
        return round($this->getUnitPrice() * $this->getQuantity(), 2);
    }
}

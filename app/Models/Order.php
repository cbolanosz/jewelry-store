<?php

/* Author: Cristian Bolaños */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * ORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the order primary key (id)
     * $this->attributes['date'] - date - contains the order date
     * $this->attributes['status'] - string - contains the order status (pending, confirmed, shipped, delivered or cancelled)
     * $this->attributes['shipping_address'] - string - contains the order shipping address
     * $this->attributes['subtotal'] - float - contains the order subtotal
     * $this->attributes['shipping_cost'] - float - contains the order shipping cost
     * $this->attributes['total_amount'] - float - contains the order total amount
     * $this->attributes['user_id'] - int - contains the associated user id
     * $this->attributes['created_at'] - timestamp - contains the order creation date
     * $this->attributes['updated_at'] - timestamp - contains the order update date
     * $this->user - User - contains the associated user
     * $this->items - OrderItem[] - contains the associated order items
     */
    protected $fillable = [
        'date',
        'status',
        'shipping_address',
        'subtotal',
        'shipping_cost',
        'total_amount',
        'user_id',
    ];

    public function setDate(string $date): void
    {
        $this->attributes['date'] = $date;
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function setShippingAddress(string $shippingAddress): void
    {
        $this->attributes['shipping_address'] = $shippingAddress;
    }

    public function setSubtotal(float $subtotal): void
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function setShippingCost(float $shippingCost): void
    {
        $this->attributes['shipping_cost'] = $shippingCost;
    }

    public function setTotalAmount(float $totalAmount): void
    {
        $this->attributes['total_amount'] = $totalAmount;
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getDate(): string
    {
        return $this->attributes['date'];
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function getShippingAddress(): string
    {
        return $this->attributes['shipping_address'];
    }

    public function getSubtotal(): float
    {
        return $this->attributes['subtotal'];
    }

    public function getShippingCost(): float
    {
        return $this->attributes['shipping_cost'];
    }

    public function getTotalAmount(): float
    {
        return $this->attributes['total_amount'];
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user()->associate($user);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getItems(): Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->setRelation('items', $items);
    }

    public function calculateSubtotal(): float
    {
        return round($this->getItems()->sum(function ($item) {
            return $item->getSubtotal();
        }), 2);
    }

    public function calculateShippingCost(): float
    {
        if ($this->getSubtotal() >= 1000) {
            return 0;
        }

        return 25;
    }

    public function calculateTotal(): float
    {
        return round($this->getSubtotal() + $this->getShippingCost(), 2);
    }

    public function confirm(): void
    {
        $this->updateStatus('confirmed');
    }

    public function updateStatus(string $status): void
    {
        $this->setStatus($status);
        $this->save();
    }

    public function isCancellable(): bool
    {
        return in_array($this->getStatus(), ['pending', 'confirmed']);
    }

    public function cancel(): void
    {
        foreach ($this->getItems() as $item) {
            $item->getProduct()->updateStock($item->getQuantity());
        }
        $this->updateStatus('cancelled');
    }
}

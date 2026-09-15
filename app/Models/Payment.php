<?php

/* Author: Diego Mesa */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Payment extends Model
{
    use HasFactory;

    /**
     * PAYMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the payment primary key (id)
     * $this->attributes['amount'] - float - contains the paid amount
     * $this->attributes['method'] - string - contains the payment method (credit_card, debit_card or bank_transfer)
     * $this->attributes['date'] - date - contains the payment date
     * $this->attributes['status'] - string - contains the payment status (pending, approved, rejected or refunded)
     * $this->attributes['transaction_code'] - string - contains the simulated transaction code
     * $this->attributes['order_id'] - int - contains the associated order id
     * $this->attributes['created_at'] - timestamp - contains the payment creation date
     * $this->attributes['updated_at'] - timestamp - contains the payment update date
     * $this->order - Order - contains the associated order
     */
    protected $fillable = [
        'amount',
        'method',
        'date',
        'status',
        'transaction_code',
        'order_id',
    ];

    public function setAmount(float $amount): void
    {
        $this->attributes['amount'] = $amount;
    }

    public function setMethod(string $method): void
    {
        $this->attributes['method'] = $method;
    }

    public function setDate(string $date): void
    {
        $this->attributes['date'] = $date;
    }

    public function setStatus(string $status): void
    {
        $this->attributes['status'] = $status;
    }

    public function setTransactionCode(string $transactionCode): void
    {
        $this->attributes['transaction_code'] = $transactionCode;
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getAmount(): float
    {
        return $this->attributes['amount'];
    }

    public function getMethod(): string
    {
        return $this->attributes['method'];
    }

    public function getDate(): string
    {
        return $this->attributes['date'];
    }

    public function getStatus(): string
    {
        return $this->attributes['status'];
    }

    public function getTransactionCode(): string
    {
        return $this->attributes['transaction_code'];
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
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

    public static function getMethods(): array
    {
        return ['credit_card', 'debit_card', 'bank_transfer'];
    }

    public function process(): void
    {
        $this->setDate(date('Y-m-d'));
        $this->setTransactionCode('TX-'.strtoupper(Str::random(12)));
        if ($this->verify()) {
            $this->setStatus('approved');
        } else {
            $this->setStatus('rejected');
        }
        $this->save();
    }

    public function verify(): bool
    {
        return round($this->getAmount(), 2) === round($this->getOrder()->getTotalAmount(), 2);
    }

    public function refund(): void
    {
        $this->setStatus('refunded');
        $this->save();
    }
}

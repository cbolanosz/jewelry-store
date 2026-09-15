<?php

/* Author: Cristian Bolaños */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('status')->default('pending');
            $table->string('shipping_address');
            $table->double('subtotal');
            $table->double('shipping_cost');
            $table->double('total_amount');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }
};

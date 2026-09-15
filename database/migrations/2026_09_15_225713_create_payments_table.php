<?php

/* Author: Diego Mesa */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->string('method');
            $table->date('date');
            $table->string('status')->default('pending');
            $table->string('transaction_code')->unique();
            $table->foreignId('order_id')->constrained();
            $table->timestamps();
        });
    }
};

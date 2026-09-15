<?php

/* Author: Pablo José Benítez Trujillo */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('material');
            $table->double('price');
            $table->integer('stock');
            $table->double('weight');
            $table->string('image_url');
            $table->boolean('active')->default(true);
            $table->foreignId('category_id')->constrained();
            $table->timestamps();
        });
    }
};

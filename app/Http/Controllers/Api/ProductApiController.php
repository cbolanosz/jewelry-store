<?php

/* Author: Cristian Bolaños */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = ProductResource::collection(Product::inStock());

        return response()->json($products, 200);
    }
}

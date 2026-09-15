<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Http\Controllers;

use App\Http\Requests\ProductSearchRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(ProductSearchRequest $request): View
    {
        $viewData = [];
        $viewData['title'] = __('product.catalog_title').' - '.__('app.brand');
        $viewData['filters'] = $request->only(['search', 'category_id', 'min_price', 'max_price']);
        $viewData['categories'] = Category::where('active', true)->orderBy('name')->get();
        $viewData['products'] = Product::search(
            $request->input('search'),
            $request->input('category_id'),
            $request->input('min_price'),
            $request->input('max_price')
        );

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $product = Product::with('category')->where('active', true)->findOrFail($id);

        $viewData = [];
        $viewData['title'] = $product->getName().' - '.__('app.brand');
        $viewData['product'] = $product;

        return view('product.show')->with('viewData', $viewData);
    }
}

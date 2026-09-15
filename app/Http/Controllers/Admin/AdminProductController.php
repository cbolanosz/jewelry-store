<?php

/* Author: Pablo José Benítez Trujillo */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('product.admin_index_title').' - '.__('admin.panel');
        $viewData['products'] = Product::with('category')->orderBy('name')->get();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('product.admin_create_title').' - '.__('admin.panel');
        $viewData['categories'] = Category::orderBy('name')->get();

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $product = new Product;
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setMaterial($request->input('material'));
        $product->setPrice($request->input('price'));
        $product->setStock($request->input('stock'));
        $product->setWeight($request->input('weight'));
        $product->setCategoryId($request->input('category_id'));
        $product->setImageUrl('/storage/'.$request->file('image')->store('products', 'public'));
        $product->setActive(true);
        $product->save();

        return redirect()->route('admin.product.index')->with('status', __('product.created'));
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $viewData['title'] = __('product.admin_edit_title').' - '.__('admin.panel');
        $viewData['product'] = Product::findOrFail($id);
        $viewData['categories'] = Category::orderBy('name')->get();

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(ProductRequest $request, string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setMaterial($request->input('material'));
        $product->setPrice($request->input('price'));
        $product->setStock($request->input('stock'));
        $product->setWeight($request->input('weight'));
        $product->setCategoryId($request->input('category_id'));
        if ($request->hasFile('image')) {
            $product->setImageUrl('/storage/'.$request->file('image')->store('products', 'public'));
        }
        $product->save();

        return redirect()->route('admin.product.index')->with('status', __('product.updated'));
    }

    public function activate(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->setActive(true);
        $product->save();

        return redirect()->route('admin.product.index')->with('status', __('product.activated'));
    }

    public function deactivate(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->setActive(false);
        $product->save();

        return redirect()->route('admin.product.index')->with('status', __('product.deactivated'));
    }

    public function delete(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        if ($product->getOrderItems()->isNotEmpty()) {
            return redirect()->route('admin.product.index')->with('error', __('product.delete_has_order_items'));
        }
        $product->delete();

        return redirect()->route('admin.product.index')->with('status', __('product.deleted'));
    }
}

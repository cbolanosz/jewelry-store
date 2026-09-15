<?php

/* Author: Diego Mesa */

namespace App\Http\Controllers;

use App\Http\Requests\CartItemRequest;
use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('cart.title').' - '.__('app.brand');
        $viewData['cart'] = $this->buildOrder($request->session()->get('cart', []));

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(CartItemRequest $request, string $id): RedirectResponse
    {
        $product = Product::where('active', true)->findOrFail($id);
        $cart = $request->session()->get('cart', []);
        $quantity = ($cart[$product->getId()] ?? 0) + $request->input('quantity');
        if (! $product->checkAvailability($quantity)) {
            return back()->with('error', __('cart.not_available', ['product' => $product->getName(), 'stock' => $product->getStock()]));
        }
        $cart[$product->getId()] = $quantity;
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', __('cart.added'));
    }

    public function update(CartItemRequest $request, string $id): RedirectResponse
    {
        $product = Product::where('active', true)->findOrFail($id);
        $quantity = (int) $request->input('quantity');
        if (! $product->checkAvailability($quantity)) {
            return redirect()->route('cart.index')->with('error', __('cart.not_available', ['product' => $product->getName(), 'stock' => $product->getStock()]));
        }
        $cart = $request->session()->get('cart', []);
        $cart[$product->getId()] = $quantity;
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', __('cart.updated'));
    }

    public function remove(Request $request, string $id): RedirectResponse
    {
        $cart = $request->session()->get('cart', []);
        unset($cart[$id]);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('status', __('cart.removed'));
    }

    public function clear(Request $request): RedirectResponse
    {
        $request->session()->forget('cart');

        return redirect()->route('cart.index')->with('status', __('cart.cleared'));
    }

    public function checkout(Request $request): View|RedirectResponse
    {
        $cart = $this->buildOrder($request->session()->get('cart', []));
        if ($cart->getItems()->isEmpty()) {
            return redirect()->route('cart.index')->with('error', __('cart.empty'));
        }

        $viewData = [];
        $viewData['title'] = __('cart.checkout_title').' - '.__('app.brand');
        $viewData['cart'] = $cart;
        $viewData['shippingAddress'] = Auth::user()->getAddress();

        return view('cart.checkout')->with('viewData', $viewData);
    }

    public function purchase(CheckoutRequest $request): RedirectResponse
    {
        $order = $this->buildOrder($request->session()->get('cart', []));
        if ($order->getItems()->isEmpty()) {
            return redirect()->route('cart.index')->with('error', __('cart.empty'));
        }
        foreach ($order->getItems() as $item) {
            if (! $item->getProduct()->checkAvailability($item->getQuantity())) {
                return redirect()->route('cart.index')->with('error', __('cart.not_available', ['product' => $item->getProduct()->getName(), 'stock' => $item->getProduct()->getStock()]));
            }
        }

        $order->setDate(date('Y-m-d'));
        $order->setStatus('pending');
        $order->setShippingAddress($request->input('shipping_address'));
        $order->setUser(Auth::user());
        $order->save();
        foreach ($order->getItems() as $item) {
            $item->setOrder($order);
            $item->save();
            $item->getProduct()->updateStock(-$item->getQuantity());
        }
        $request->session()->forget('cart');

        return redirect()->route('order.show', ['id' => $order->getId()])->with('status', __('cart.purchased'));
    }

    private function buildOrder(array $cart): Order
    {
        $items = new Collection;
        $products = Product::where('active', true)->whereIn('id', array_keys($cart))->orderBy('name')->get();
        foreach ($products as $product) {
            $item = new OrderItem;
            $item->setProduct($product);
            $item->setQuantity($cart[$product->getId()]);
            $item->setUnitPrice($product->getPrice());
            $item->setSubtotal($item->calculateSubtotal());
            $items->push($item);
        }

        $order = new Order;
        $order->setItems($items);
        $order->setSubtotal($order->calculateSubtotal());
        $order->setShippingCost($order->calculateShippingCost());
        $order->setTotalAmount($order->calculateTotal());

        return $order;
    }
}

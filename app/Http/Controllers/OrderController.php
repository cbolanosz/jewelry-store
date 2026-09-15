<?php

/* Author: Cristian Bolaños */

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('order.index_title').' - '.__('app.brand');
        $viewData['orders'] = Order::where('user_id', Auth::user()->getId())->orderBy('date', 'desc')->orderBy('id', 'desc')->get();

        return view('order.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $order = Order::with('items.product', 'payments')->where('user_id', Auth::user()->getId())->findOrFail($id);

        $viewData = [];
        $viewData['title'] = __('order.show_title', ['id' => $order->getId()]).' - '.__('app.brand');
        $viewData['order'] = $order;

        return view('order.show')->with('viewData', $viewData);
    }

    public function cancel(string $id): RedirectResponse
    {
        $order = Order::with('items.product', 'payments')->where('user_id', Auth::user()->getId())->findOrFail($id);
        if (! $order->isCancellable()) {
            return redirect()->route('order.show', ['id' => $order->getId()])->with('error', __('order.not_cancellable'));
        }
        $order->cancel();

        return redirect()->route('order.show', ['id' => $order->getId()])->with('status', __('order.cancelled'));
    }

    public function invoice(string $id): Response|RedirectResponse
    {
        $order = Order::with('items.product', 'payments', 'user')->where('user_id', Auth::user()->getId())->findOrFail($id);
        if (! $order->isPaid()) {
            return redirect()->route('order.show', ['id' => $order->getId()])->with('error', __('order.invoice_not_available'));
        }

        return $order->generateInvoice()->download(__('order.invoice_file', ['id' => $order->getId()]));
    }
}

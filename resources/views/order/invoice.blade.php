{{-- Author: Diego Mesa --}}
@extends('layouts.pdf')

@section('title', __('order.invoice_title', ['id' => $viewData['order']->getId()]))

@section('content')
    <table class="header">
        <tr>
            <td>
                <span class="logo">{{ __('app.brand_short') }}</span>
                <span class="brand">{{ __('app.brand') }}</span>
                <div class="muted">{{ __('app.tagline') }}</div>
            </td>
            <td class="text-right">
                <h1>{{ __('order.invoice_title', ['id' => $viewData['order']->getId()]) }}</h1>
                <div class="muted">{{ __('order.invoice_order_date') }}: {{ $viewData['order']->getDate() }}</div>
            </td>
        </tr>
    </table>

    <table class="details">
        <tr>
            <td>
                <h2>{{ __('order.invoice_billed_to') }}</h2>
                <div>{{ $viewData['order']->getUser()->getFirstName() }} {{ $viewData['order']->getUser()->getLastName() }}</div>
                <div>{{ $viewData['order']->getUser()->getEmail() }}</div>
                <div>{{ $viewData['order']->getShippingAddress() }}</div>
            </td>
            <td>
                <h2>{{ __('payment.title') }}</h2>
                @foreach ($viewData['order']->getPayments() as $payment)
                    <div>{{ __('payment.method_'.$payment->getMethod()) }} · {{ __('payment.status_'.$payment->getStatus()) }}</div>
                    <div>{{ __('payment.transaction_code') }}: {{ $payment->getTransactionCode() }}</div>
                    <div>{{ __('payment.date') }}: {{ $payment->getDate() }}</div>
                @endforeach
            </td>
        </tr>
    </table>

    <table class="items">
        <thead>
            <tr>
                <th>{{ __('order.product') }}</th>
                <th class="text-right">{{ __('order.unit_price') }}</th>
                <th class="text-right">{{ __('order.quantity') }}</th>
                <th class="text-right">{{ __('order.subtotal') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($viewData['order']->getItems() as $item)
                <tr>
                    <td>{{ $item->getProduct()->getName() }}</td>
                    <td class="text-right">{{ __('product.price_value', ['price' => number_format($item->getUnitPrice(), 2)]) }}</td>
                    <td class="text-right">{{ $item->getQuantity() }}</td>
                    <td class="text-right">{{ __('product.price_value', ['price' => number_format($item->getSubtotal(), 2)]) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="totals">
        <tr>
            <td>{{ __('order.subtotal') }}</td>
            <td class="text-right">{{ __('product.price_value', ['price' => number_format($viewData['order']->getSubtotal(), 2)]) }}</td>
        </tr>
        <tr>
            <td>{{ __('order.shipping_cost') }}</td>
            <td class="text-right">
                @if ($viewData['order']->getShippingCost() == 0)
                    {{ __('order.free_shipping') }}
                @else
                    {{ __('product.price_value', ['price' => number_format($viewData['order']->getShippingCost(), 2)]) }}
                @endif
            </td>
        </tr>
        <tr class="grand-total">
            <td>{{ __('order.total_amount') }}</td>
            <td class="text-right">{{ __('product.price_value', ['price' => number_format($viewData['order']->getTotalAmount(), 2)]) }}</td>
        </tr>
    </table>

    <p class="footer">{{ __('order.invoice_footer') }} · {{ __('app.footer_team') }}</p>
@endsection

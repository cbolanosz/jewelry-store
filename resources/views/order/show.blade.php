{{-- Author: Cristian Bolaños --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="container py-5">
        <a class="d-inline-block mb-4" href="{{ route('order.index') }}">{{ __('order.back_to_orders') }}</a>
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
            <h1 class="product-title mb-0">{{ __('order.show_title', ['id' => $viewData['order']->getId()]) }}</h1>
            <span class="badge fs-6 order-status order-status-{{ $viewData['order']->getStatus() }}">{{ __('order.status_'.$viewData['order']->getStatus()) }}</span>
        </div>

        <div class="row g-4">
            <div class="col-md-7">
                <div class="card auth-card h-100">
                    <div class="card-body">
                        <dl class="row mb-0">
                            <dt class="col-sm-5">{{ __('order.date') }}</dt>
                            <dd class="col-sm-7">{{ $viewData['order']->getDate() }}</dd>
                            <dt class="col-sm-5">{{ __('order.shipping_address') }}</dt>
                            <dd class="col-sm-7 mb-0">{{ $viewData['order']->getShippingAddress() }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card auth-card h-100">
                    <div class="card-body">
                        <h2 class="h5 product-title">{{ __('order.summary') }}</h2>
                        <dl class="row mb-0">
                            <dt class="col-6 fw-normal">{{ __('order.subtotal') }}</dt>
                            <dd class="col-6 text-end">{{ __('product.price_value', ['price' => number_format($viewData['order']->getSubtotal(), 2)]) }}</dd>
                            <dt class="col-6 fw-normal">{{ __('order.shipping_cost') }}</dt>
                            <dd class="col-6 text-end">
                                @if ($viewData['order']->getShippingCost() == 0)
                                    {{ __('order.free_shipping') }}
                                @else
                                    {{ __('product.price_value', ['price' => number_format($viewData['order']->getShippingCost(), 2)]) }}
                                @endif
                            </dd>
                            <dt class="col-6 border-top pt-2">{{ __('order.total_amount') }}</dt>
                            <dd class="col-6 text-end border-top pt-2 product-price mb-0">{{ __('product.price_value', ['price' => number_format($viewData['order']->getTotalAmount(), 2)]) }}</dd>
                        </dl>
                        @if ($viewData['order']->isCancellable())
                            <form method="POST" action="{{ route('order.cancel', ['id' => $viewData['order']->getId()]) }}" class="mt-4">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-outline-danger w-100">{{ __('order.cancel_button') }}</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card auth-card mt-4">
            <div class="card-body p-0">
                <h2 class="h5 product-title p-3 mb-0">{{ __('order.items') }}</h2>
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-3">{{ __('order.product') }}</th>
                                <th class="text-end">{{ __('order.unit_price') }}</th>
                                <th class="text-end">{{ __('order.quantity') }}</th>
                                <th class="text-end pe-3">{{ __('order.subtotal') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['order']->getItems() as $item)
                                <tr>
                                    <td class="ps-3">
                                        <div class="d-flex align-items-center gap-3">
                                            <img class="cart-thumb" src="{{ $item->getProduct()->getImageUrl() }}" alt="{{ $item->getProduct()->getName() }}">
                                            <a href="{{ route('product.show', ['id' => $item->getProduct()->getId()]) }}">{{ $item->getProduct()->getName() }}</a>
                                        </div>
                                    </td>
                                    <td class="text-end">{{ __('product.price_value', ['price' => number_format($item->getUnitPrice(), 2)]) }}</td>
                                    <td class="text-end">{{ $item->getQuantity() }}</td>
                                    <td class="text-end pe-3">{{ __('product.price_value', ['price' => number_format($item->getSubtotal(), 2)]) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

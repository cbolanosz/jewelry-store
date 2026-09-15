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
    </section>
@endsection

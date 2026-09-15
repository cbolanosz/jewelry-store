{{-- Author: Cristian Bolaños --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="container py-5">
        <h1 class="product-title mb-4">{{ __('order.index_title') }}</h1>

        @if ($viewData['orders']->isEmpty())
            <div class="card auth-card">
                <div class="card-body text-center py-5">
                    <p class="text-secondary">{{ __('order.empty') }}</p>
                    <a class="btn btn-gold" href="{{ route('product.index') }}">{{ __('order.browse_collection') }}</a>
                </div>
            </div>
        @else
            <div class="card auth-card">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">{{ __('order.number') }}</th>
                                <th>{{ __('order.date') }}</th>
                                <th>{{ __('order.status') }}</th>
                                <th class="text-end">{{ __('order.total_amount') }}</th>
                                <th class="text-end pe-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['orders'] as $order)
                                <tr>
                                    <td class="ps-4 fw-semibold">#{{ $order->getId() }}</td>
                                    <td>{{ $order->getDate() }}</td>
                                    <td>
                                        <span class="badge order-status order-status-{{ $order->getStatus() }}">{{ __('order.status_'.$order->getStatus()) }}</span>
                                    </td>
                                    <td class="text-end">{{ __('product.price_value', ['price' => number_format($order->getTotalAmount(), 2)]) }}</td>
                                    <td class="text-end pe-4">
                                        <a class="btn btn-sm btn-outline-dark" href="{{ route('order.show', ['id' => $order->getId()]) }}">{{ __('order.view_details') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </section>
@endsection

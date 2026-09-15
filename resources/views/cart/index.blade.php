{{-- Author: Diego Mesa --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="container py-5">
        <h1 class="product-title mb-4">{{ __('cart.title') }}</h1>
        @error('quantity')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        @if ($viewData['cart']->getItems()->isEmpty())
            <div class="card auth-card">
                <div class="card-body text-center py-5">
                    <p class="text-secondary">{{ __('cart.empty') }}</p>
                    <a class="btn btn-gold" href="{{ route('product.index') }}">{{ __('cart.browse_collection') }}</a>
                </div>
            </div>
        @else
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="card auth-card">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="ps-3">{{ __('cart.product') }}</th>
                                        <th class="text-end">{{ __('cart.unit_price') }}</th>
                                        <th>{{ __('cart.quantity') }}</th>
                                        <th class="text-end">{{ __('cart.subtotal') }}</th>
                                        <th class="pe-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($viewData['cart']->getItems() as $item)
                                        <tr>
                                            <td class="ps-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img class="cart-thumb" src="{{ $item->getProduct()->getImageUrl() }}" alt="{{ $item->getProduct()->getName() }}">
                                                    <a href="{{ route('product.show', ['id' => $item->getProduct()->getId()]) }}">{{ $item->getProduct()->getName() }}</a>
                                                </div>
                                            </td>
                                            <td class="text-end text-nowrap">{{ __('product.price_value', ['price' => number_format($item->getUnitPrice(), 2)]) }}</td>
                                            <td>
                                                <form method="POST" action="{{ route('cart.update', ['id' => $item->getProduct()->getId()]) }}" class="d-flex gap-2">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="number" class="form-control form-control-sm cart-quantity" name="quantity" value="{{ $item->getQuantity() }}" min="1" max="{{ $item->getProduct()->getStock() }}" aria-label="{{ __('cart.quantity') }}" required>
                                                    <button type="submit" class="btn btn-sm btn-outline-dark">{{ __('cart.update_button') }}</button>
                                                </form>
                                            </td>
                                            <td class="text-end text-nowrap">{{ __('product.price_value', ['price' => number_format($item->getSubtotal(), 2)]) }}</td>
                                            <td class="pe-3 text-end">
                                                <form method="POST" action="{{ route('cart.remove', ['id' => $item->getProduct()->getId()]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('cart.remove_button') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('cart.clear') }}" class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger px-0">{{ __('cart.clear_button') }}</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    @include('cart.partials.summary', ['cart' => $viewData['cart']])
                    <a class="btn btn-gold w-100 mt-3" href="{{ route('cart.checkout') }}">{{ __('cart.checkout_button') }}</a>
                </div>
            </div>
        @endif
    </section>
@endsection

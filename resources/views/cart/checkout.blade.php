{{-- Author: Diego Mesa --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="container py-5">
        <a class="d-inline-block mb-4" href="{{ route('cart.index') }}">{{ __('cart.back_to_cart') }}</a>
        <h1 class="product-title mb-4">{{ __('cart.checkout_title') }}</h1>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card auth-card">
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            @foreach ($viewData['cart']->getItems() as $item)
                                <li class="d-flex align-items-center gap-3 py-2 border-bottom">
                                    <img class="cart-thumb" src="{{ $item->getProduct()->getImageUrl() }}" alt="{{ $item->getProduct()->getName() }}">
                                    <div class="flex-grow-1">
                                        <div>{{ $item->getProduct()->getName() }}</div>
                                        <small class="text-secondary">{{ $item->getQuantity() }} × {{ __('product.price_value', ['price' => number_format($item->getUnitPrice(), 2)]) }}</small>
                                    </div>
                                    <span>{{ __('product.price_value', ['price' => number_format($item->getSubtotal(), 2)]) }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('cart.partials.summary', ['cart' => $viewData['cart']])
                <form method="POST" action="{{ route('cart.purchase') }}" class="card auth-card mt-3">
                    @csrf
                    <div class="card-body">
                        <label for="shipping_address" class="form-label">{{ __('cart.shipping_address') }}</label>
                        <input id="shipping_address" type="text" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" value="{{ old('shipping_address', $viewData['shippingAddress']) }}" required>
                        @error('shipping_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-gold w-100 mt-3">{{ __('cart.place_order_button') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

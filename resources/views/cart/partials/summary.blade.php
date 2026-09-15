{{-- Author: Diego Mesa --}}
<div class="card auth-card">
    <div class="card-body">
        <h2 class="h5 product-title">{{ __('cart.summary') }}</h2>
        <dl class="row mb-0">
            <dt class="col-6 fw-normal">{{ __('cart.subtotal') }}</dt>
            <dd class="col-6 text-end">{{ __('product.price_value', ['price' => number_format($cart->getSubtotal(), 2)]) }}</dd>
            <dt class="col-6 fw-normal">{{ __('cart.shipping_cost') }}</dt>
            <dd class="col-6 text-end">
                @if ($cart->getShippingCost() == 0)
                    {{ __('cart.free_shipping') }}
                @else
                    {{ __('product.price_value', ['price' => number_format($cart->getShippingCost(), 2)]) }}
                @endif
            </dd>
            <dt class="col-6 border-top pt-2">{{ __('cart.total_amount') }}</dt>
            <dd class="col-6 text-end border-top pt-2 product-price mb-0">{{ __('product.price_value', ['price' => number_format($cart->getTotalAmount(), 2)]) }}</dd>
        </dl>
    </div>
</div>

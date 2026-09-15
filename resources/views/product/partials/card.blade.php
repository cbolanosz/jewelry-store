{{-- Author: Diego Mesa --}}
<div class="card product-card h-100">
    <img class="card-img-top product-card-image" src="{{ $product->getImageUrl() }}" alt="{{ $product->getName() }}">
    <div class="card-body d-flex flex-column">
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-secondary text-uppercase">{{ $product->getCategory()->getName() }}</small>
            @if ($showUnitsSold ?? false)
                <span class="badge text-bg-dark">{{ __('product.units_sold', ['count' => $product->getUnitsSold()]) }}</span>
            @endif
        </div>
        <h2 class="h5 card-title mt-1">{{ $product->getName() }}</h2>
        <p class="text-secondary small mb-2">{{ $product->getMaterial() }}</p>
        <p class="product-price mb-3">{{ __('product.price_value', ['price' => number_format($product->getPrice(), 2)]) }}</p>
        <a class="btn btn-outline-dark mt-auto" href="{{ route('product.show', ['id' => $product->getId()]) }}">{{ __('product.view_details') }}</a>
    </div>
</div>

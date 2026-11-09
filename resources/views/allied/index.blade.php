{{-- Author: Cristian Bolaños --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="catalog-header text-center text-white py-5">
        <div class="container">
            <h1 class="hero-title mb-2">{{ __('allied.title') }}</h1>
            <p class="mb-0">{{ __('allied.subtitle') }}</p>
        </div>
    </section>

    <section class="container py-4">
        <div class="row g-4">
            @forelse ($viewData['products'] as $product)
                <div class="col-sm-6 col-lg-4">
                    <div class="card product-card h-100">
                        <img class="card-img-top product-card-image" src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                        <div class="card-body d-flex flex-column">
                            <small class="text-secondary text-uppercase">{{ $product['category'] }}</small>
                            <h2 class="h5 card-title mt-1">{{ $product['name'] }}</h2>
                            <p class="text-secondary small mb-2">{{ $product['brand'] }}</p>
                            <p class="product-price mb-3">{{ __('product.price_value', ['price' => number_format($product['price'], 2)]) }}</p>
                            <a class="btn btn-outline-dark mt-auto" href="{{ $product['url'] }}" target="_blank" rel="noopener">{{ __('allied.view_in_store') }}</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-secondary">{{ __('allied.empty') }}</p>
                </div>
            @endforelse
        </div>
    </section>
@endsection

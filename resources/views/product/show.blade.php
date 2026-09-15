{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="container py-5">
        <a class="d-inline-block mb-4" href="{{ route('product.index') }}">{{ __('product.back_to_catalog') }}</a>
        <div class="row g-5">
            <div class="col-md-6">
                <img class="product-image" src="{{ $viewData['product']->getImageUrl() }}" alt="{{ $viewData['product']->getName() }}">
            </div>
            <div class="col-md-6">
                <small class="text-secondary text-uppercase">{{ $viewData['product']->getCategory()->getName() }}</small>
                <h1 class="product-title mt-1">{{ $viewData['product']->getName() }}</h1>
                <p class="product-price fs-3">{{ __('product.price_value', ['price' => number_format($viewData['product']->getPrice(), 2)]) }}</p>
                <p class="text-secondary">{{ $viewData['product']->getDescription() }}</p>
                <dl class="row">
                    <dt class="col-sm-4">{{ __('product.material') }}</dt>
                    <dd class="col-sm-8">{{ $viewData['product']->getMaterial() }}</dd>
                    <dt class="col-sm-4">{{ __('product.weight') }}</dt>
                    <dd class="col-sm-8">{{ $viewData['product']->getWeight() }}</dd>
                    <dt class="col-sm-4">{{ __('product.stock') }}</dt>
                    <dd class="col-sm-8">
                        @if ($viewData['product']->checkAvailability(1))
                            <span class="badge text-bg-success">{{ __('product.in_stock', ['stock' => $viewData['product']->getStock()]) }}</span>
                        @else
                            <span class="badge text-bg-secondary">{{ __('product.out_of_stock') }}</span>
                        @endif
                    </dd>
                </dl>
            </div>
        </div>
    </section>
@endsection

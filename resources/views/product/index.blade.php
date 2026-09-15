{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="catalog-header text-center text-white py-5">
        <div class="container">
            <h1 class="hero-title mb-2">{{ __('product.catalog_title') }}</h1>
            <p class="mb-0">{{ __('product.catalog_subtitle') }}</p>
        </div>
    </section>

    <section class="container py-4">
        <form method="GET" action="{{ route('product.index') }}" class="card card-body mb-4">
            @csrf
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="search" class="form-label">{{ __('product.search') }}</label>
                    <input id="search" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ $viewData['filters']['search'] ?? '' }}" placeholder="{{ __('product.search_placeholder') }}">
                    @error('search')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="category_id" class="form-label">{{ __('product.category') }}</label>
                    <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id">
                        <option value="">{{ __('product.all_categories') }}</option>
                        @foreach ($viewData['categories'] as $category)
                            <option value="{{ $category->getId() }}" @selected(($viewData['filters']['category_id'] ?? '') == $category->getId())>{{ $category->getName() }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="min_price" class="form-label">{{ __('product.min_price') }}</label>
                    <input id="min_price" type="number" step="0.01" min="0" class="form-control @error('min_price') is-invalid @enderror" name="min_price" value="{{ $viewData['filters']['min_price'] ?? '' }}">
                    @error('min_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-2">
                    <label for="max_price" class="form-label">{{ __('product.max_price') }}</label>
                    <input id="max_price" type="number" step="0.01" min="0" class="form-control @error('max_price') is-invalid @enderror" name="max_price" value="{{ $viewData['filters']['max_price'] ?? '' }}">
                    @error('max_price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-1 d-grid gap-2">
                    <button type="submit" class="btn btn-gold">{{ __('product.filter_button') }}</button>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <small class="text-secondary">{{ __('product.results', ['count' => $viewData['products']->count()]) }}</small>
                <a class="small" href="{{ route('product.index') }}">{{ __('product.clear_filters') }}</a>
            </div>
        </form>

        @if ($viewData['products']->isEmpty())
            <p class="text-center text-secondary py-5">{{ __('product.no_results') }}</p>
        @else
            <div class="row g-4">
                @foreach ($viewData['products'] as $product)
                    <div class="col-sm-6 col-lg-4 col-xl-3">
                        <div class="card product-card h-100">
                            <img class="card-img-top product-card-image" src="{{ $product->getImageUrl() }}" alt="{{ $product->getName() }}">
                            <div class="card-body d-flex flex-column">
                                <small class="text-secondary text-uppercase">{{ $product->getCategory()->getName() }}</small>
                                <h2 class="h5 card-title mt-1">{{ $product->getName() }}</h2>
                                <p class="text-secondary small mb-2">{{ $product->getMaterial() }}</p>
                                <p class="product-price mb-3">{{ __('product.price_value', ['price' => number_format($product->getPrice(), 2)]) }}</p>
                                <a class="btn btn-outline-dark mt-auto" href="{{ route('product.show', ['id' => $product->getId()]) }}">{{ __('product.view_details') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </section>
@endsection

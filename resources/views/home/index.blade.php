{{-- Author: Cristian Bolaños --}}
@extends('layouts.app')

@section('title', $viewData['title'])

@section('content')
    <section class="hero text-center text-white py-5">
        <div class="container py-5">
            <h1 class="hero-title display-4 mb-3">{{ __('home.hero_title') }}</h1>
            <p class="lead mx-auto hero-text">{{ __('home.hero_text') }}</p>
        </div>
    </section>

    @if ($viewData['topProducts']->isNotEmpty())
        <section class="container pt-5">
            <div class="text-center mb-4">
                <h2 class="hero-title">{{ __('home.best_sellers_title') }}</h2>
                <p class="text-secondary mb-0">{{ __('home.best_sellers_subtitle') }}</p>
            </div>
            <div class="row g-4">
                @foreach ($viewData['topProducts'] as $product)
                    <div class="col-md-4">
                        @include('product.partials.card', ['product' => $product, 'showUnitsSold' => true])
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    <section class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <h2 class="h5 card-title">{{ __('home.watches_title') }}</h2>
                        <p class="card-text text-secondary">{{ __('home.watches_text') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <h2 class="h5 card-title">{{ __('home.jewelry_title') }}</h2>
                        <p class="card-text text-secondary">{{ __('home.jewelry_text') }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feature-card h-100">
                    <div class="card-body">
                        <h2 class="h5 card-title">{{ __('home.orders_title') }}</h2>
                        <p class="card-text text-secondary">{{ __('home.orders_text') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

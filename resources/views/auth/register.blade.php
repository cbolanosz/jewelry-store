{{-- Author: Cristian Bolaños --}}
@extends('layouts.app')

@section('title', __('auth.register_title').' - '.__('app.brand'))

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card auth-card">
                    <div class="card-body p-4">
                        <h1 class="h3 auth-title text-center mb-4">{{ __('auth.register_title') }}</h1>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    @include('auth.partials.input', ['name' => 'first_name', 'type' => 'text', 'autocomplete' => 'given-name'])
                                </div>
                                <div class="col-md-6">
                                    @include('auth.partials.input', ['name' => 'last_name', 'type' => 'text', 'autocomplete' => 'family-name'])
                                </div>
                            </div>
                            @include('auth.partials.input', ['name' => 'email', 'type' => 'email', 'autocomplete' => 'email'])
                            @include('auth.partials.input', ['name' => 'phone', 'type' => 'tel', 'autocomplete' => 'tel'])
                            @include('auth.partials.input', ['name' => 'address', 'type' => 'text', 'autocomplete' => 'street-address'])
                            @include('auth.partials.input', ['name' => 'password', 'type' => 'password', 'autocomplete' => 'new-password'])
                            @include('auth.partials.input', ['name' => 'password_confirmation', 'type' => 'password', 'autocomplete' => 'new-password'])
                            <button type="submit" class="btn btn-gold w-100">{{ __('auth.register_button') }}</button>
                        </form>
                        <p class="text-center text-secondary mt-3 mb-0">
                            {{ __('auth.has_account') }}
                            <a href="{{ route('login') }}">{{ __('auth.login_title') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

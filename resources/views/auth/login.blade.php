{{-- Author: Cristian Bolaños --}}
@extends('layouts.app')

@section('title', __('auth.login_title').' - '.__('app.brand'))

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card auth-card">
                    <div class="card-body p-4">
                        <h1 class="h3 auth-title text-center mb-4">{{ __('auth.login_title') }}</h1>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @include('auth.partials.input', ['name' => 'email', 'type' => 'email', 'autocomplete' => 'email'])
                            @include('auth.partials.input', ['name' => 'password', 'type' => 'password', 'autocomplete' => 'current-password'])
                            <div class="form-check mb-3">
                                <input id="remember" class="form-check-input" type="checkbox" name="remember" @checked(old('remember'))>
                                <label class="form-check-label" for="remember">{{ __('auth.remember_me') }}</label>
                            </div>
                            <button type="submit" class="btn btn-gold w-100">{{ __('auth.login_button') }}</button>
                        </form>
                        <p class="text-center text-secondary mt-3 mb-0">
                            {{ __('auth.no_account') }}
                            <a href="{{ route('register') }}">{{ __('auth.register_title') }}</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

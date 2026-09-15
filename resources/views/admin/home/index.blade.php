{{-- Author: Cristian Bolaños --}}
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('subtitle', __('admin.dashboard'))

@section('content')
    <div class="card admin-card">
        <div class="card-body">
            <h2 class="h4 card-title">{{ __('admin.welcome_title') }}</h2>
            <p class="card-text text-secondary mb-0">{{ __('admin.welcome_text') }}</p>
        </div>
    </div>
@endsection

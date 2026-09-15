{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('subtitle', __('category.admin_create_title'))

@section('content')
    <div class="card admin-card">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.category.store') }}">
                @csrf
                @include('admin.category.partials.form', ['category' => null])
            </form>
        </div>
    </div>
@endsection

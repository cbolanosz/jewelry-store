{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('subtitle', __('product.admin_create_title'))

@section('content')
    <div class="card admin-card">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                @include('admin.product.partials.form', ['product' => null, 'categories' => $viewData['categories']])
            </form>
        </div>
    </div>
@endsection

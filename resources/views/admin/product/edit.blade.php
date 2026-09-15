{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('subtitle', __('product.admin_edit_title'))

@section('content')
    <div class="card admin-card">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @include('admin.product.partials.form', ['product' => $viewData['product'], 'categories' => $viewData['categories']])
            </form>
        </div>
    </div>
@endsection

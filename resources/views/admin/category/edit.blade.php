{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('subtitle', __('category.admin_edit_title'))

@section('content')
    <div class="card admin-card">
        <div class="card-body p-4">
            <form method="POST" action="{{ route('admin.category.update', ['id' => $viewData['category']->getId()]) }}">
                @csrf
                @method('PUT')
                @include('admin.category.partials.form', ['category' => $viewData['category']])
            </form>
        </div>
    </div>
@endsection

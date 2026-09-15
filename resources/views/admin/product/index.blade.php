{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('subtitle', __('product.admin_index_title'))

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary" href="{{ route('admin.product.create') }}">{{ __('product.create_button') }}</a>
    </div>

    <div class="card admin-card">
        <div class="card-body p-0">
            @if ($viewData['products']->isEmpty())
                <p class="text-secondary p-4 mb-0">{{ __('product.empty') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th class="ps-4">{{ __('product.image') }}</th>
                                <th>{{ __('product.name') }}</th>
                                <th>{{ __('product.category') }}</th>
                                <th>{{ __('product.material') }}</th>
                                <th class="text-end">{{ __('product.price') }}</th>
                                <th class="text-end">{{ __('product.stock') }}</th>
                                <th>{{ __('admin.status') }}</th>
                                <th class="text-end pe-4">{{ __('admin.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData['products'] as $product)
                                <tr>
                                    <td class="ps-4">
                                        <img class="product-thumb" src="{{ $product->getImageUrl() }}" alt="{{ $product->getName() }}">
                                    </td>
                                    <td class="fw-semibold">{{ $product->getName() }}</td>
                                    <td>{{ $product->getCategory()->getName() }}</td>
                                    <td class="text-secondary">{{ $product->getMaterial() }}</td>
                                    <td class="text-end">{{ number_format($product->getPrice(), 2) }}</td>
                                    <td class="text-end">{{ $product->getStock() }}</td>
                                    <td>
                                        @if ($product->getActive())
                                            <span class="badge text-bg-success">{{ __('admin.active') }}</span>
                                        @else
                                            <span class="badge text-bg-secondary">{{ __('admin.inactive') }}</span>
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="d-inline-flex gap-2">
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.product.edit', ['id' => $product->getId()]) }}">{{ __('admin.edit') }}</a>
                                            @if ($product->getActive())
                                                <form method="POST" action="{{ route('admin.product.deactivate', ['id' => $product->getId()]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-outline-warning">{{ __('admin.deactivate') }}</button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('admin.product.activate', ['id' => $product->getId()]) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="btn btn-sm btn-outline-success">{{ __('admin.activate') }}</button>
                                                </form>
                                            @endif
                                            <form method="POST" action="{{ route('admin.product.delete', ['id' => $product->getId()]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('admin.delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

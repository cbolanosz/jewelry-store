{{-- Author: Pablo José Benítez Trujillo --}}
@extends('layouts.admin')

@section('title', $viewData['title'])

@section('subtitle', __('category.admin_index_title'))

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a class="btn btn-primary" href="{{ route('admin.category.create') }}">{{ __('category.create_button') }}</a>
    </div>

    <div class="card admin-card">
        <div class="card-body p-0">
            @if ($viewData['categories']->isEmpty())
                <p class="text-secondary p-4 mb-0">{{ __('category.empty') }}</p>
            @else
                <table class="table table-hover align-middle mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4">{{ __('category.name') }}</th>
                            <th>{{ __('category.description') }}</th>
                            <th>{{ __('admin.status') }}</th>
                            <th class="text-end pe-4">{{ __('admin.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['categories'] as $category)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $category->getName() }}</td>
                                <td class="text-secondary">{{ $category->getDescription() }}</td>
                                <td>
                                    @if ($category->getActive())
                                        <span class="badge text-bg-success">{{ __('admin.active') }}</span>
                                    @else
                                        <span class="badge text-bg-secondary">{{ __('admin.inactive') }}</span>
                                    @endif
                                </td>
                                <td class="text-end pe-4">
                                    <div class="d-inline-flex gap-2">
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.category.edit', ['id' => $category->getId()]) }}">{{ __('admin.edit') }}</a>
                                        @if ($category->getActive())
                                            <form method="POST" action="{{ route('admin.category.deactivate', ['id' => $category->getId()]) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-outline-warning">{{ __('admin.deactivate') }}</button>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('admin.category.activate', ['id' => $category->getId()]) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-outline-success">{{ __('admin.activate') }}</button>
                                            </form>
                                        @endif
                                        <form method="POST" action="{{ route('admin.category.delete', ['id' => $category->getId()]) }}">
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
            @endif
        </div>
    </div>
@endsection

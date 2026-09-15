{{-- Author: Pablo José Benítez Trujillo --}}
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">{{ __('product.name') }}</label>
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product?->getName()) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="category_id" class="form-label">{{ __('product.category') }}</label>
        <select id="category_id" class="form-select @error('category_id') is-invalid @enderror" name="category_id" required>
            <option value="">{{ __('product.select_category') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->getId() }}" @selected(old('category_id', $product?->getCategoryId()) == $category->getId())>{{ $category->getName() }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="mb-3">
    <label for="description" class="form-label">{{ __('product.description') }}</label>
    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="3" required>{{ old('description', $product?->getDescription()) }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label for="material" class="form-label">{{ __('product.material') }}</label>
        <input id="material" type="text" class="form-control @error('material') is-invalid @enderror" name="material" value="{{ old('material', $product?->getMaterial()) }}" required>
        @error('material')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-3">
        <label for="price" class="form-label">{{ __('product.price') }}</label>
        <input id="price" type="number" step="0.01" min="0" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product?->getPrice()) }}" required>
        @error('price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-3">
        <label for="stock" class="form-label">{{ __('product.stock') }}</label>
        <input id="stock" type="number" step="1" min="0" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $product?->getStock()) }}" required>
        @error('stock')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-md-2 mb-3">
        <label for="weight" class="form-label">{{ __('product.weight') }}</label>
        <input id="weight" type="number" step="0.01" min="0" class="form-control @error('weight') is-invalid @enderror" name="weight" value="{{ old('weight', $product?->getWeight()) }}" required>
        @error('weight')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="mb-4">
    <label for="image" class="form-label">{{ __('product.image') }}</label>
    @if ($product)
        <div class="mb-2">
            <img class="product-preview" src="{{ $product->getImageUrl() }}" alt="{{ $product->getName() }}">
        </div>
    @endif
    <input id="image" type="file" accept="image/*" class="form-control @error('image') is-invalid @enderror" name="image">
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
    @if ($product)
        <div class="form-text">{{ __('product.image_help') }}</div>
    @endif
</div>
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.product.index') }}">{{ __('admin.cancel') }}</a>
</div>

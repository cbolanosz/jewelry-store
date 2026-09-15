{{-- Author: Pablo José Benítez Trujillo --}}
<div class="mb-3">
    <label for="name" class="form-label">{{ __('category.name') }}</label>
    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $category?->getName()) }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-4">
    <label for="description" class="form-label">{{ __('category.description') }}</label>
    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description', $category?->getDescription()) }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="d-flex gap-2">
    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
    <a class="btn btn-outline-secondary" href="{{ route('admin.category.index') }}">{{ __('admin.cancel') }}</a>
</div>

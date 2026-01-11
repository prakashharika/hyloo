<x-layouts.app.sidebar>
    <flux:main>

        <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

        <div class="admin-container">

            <!-- Header -->
            <div class="admin-header">
                <h1 class="admin-title">
                    {{ isset($subcategory) ? 'Edit SubCategory' : 'Add SubCategory' }}
                </h1>
            </div>

            <!-- Card -->
            <div class="admin-card">
                <form
                    action="{{ isset($subcategory)
                        ? route('category.subcategory.update', [$category, $subcategory])
                        : route('category.subcategory.store', $category) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if(isset($subcategory))
                        @method('PUT')
                    @endif

                    <!-- Basic fields -->
                    <div class="form-grid">

                        <input type="hidden" name="category_id" value="{{ old('category_id', $subcategory->category_id ?? $category->category_id) }}">

                        <div class="form-group">
                            <label class="form-label">SubCategory Name *</label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $subcategory->name ?? '') }}"
                                   class="form-input"
                                   required>
                            @error('name')
                                <small class="text-error">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Priority *</label>
                            <input type="number"
                                   name="priority"
                                   min="0"
                                   step="1"
                                   value="{{ old('priority', $subcategory->priority ?? 0) }}"
                                   class="form-input"
                                   required>
                            <small class="text-muted">Lower number = higher priority</small>
                            @error('priority')
                                <small class="text-error">{{ $message }}</small>
                            @enderror
                        </div>

                    </div>

                    <!-- Description -->
                    <div class="form-group mt-3">
                        <label class="form-label">Description</label>
                        <textarea name="description"
                                  rows="3"
                                  class="form-input">{{ old('description', $subcategory->description ?? '') }}</textarea>
                        @error('description')
                            <small class="text-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="form-group mt-3">
                        <label class="form-label">SubCategory Image</label>

                        @if(isset($subcategory) && $subcategory->image_url)
                            <div class="image-preview">
                                <img src="{{ $subcategory->image_url }}" alt="{{ $subcategory->name }}">
                                <small class="text-muted">Current image</small>
                            </div>
                        @endif

                        <input type="file" name="image" class="form-input" accept="image/*">
                        <small class="text-muted">JPG, PNG, GIF, SVG up to 2MB</small>

                        @error('image')
                            <small class="text-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="form-group mt-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-input" required>
                            <option value="active"
                                @selected(old('status', $subcategory->status ?? 'active') === 'active')>
                                Active
                            </option>
                            <option value="inactive"
                                @selected(old('status', $subcategory->status ?? 'active') === 'inactive')>
                                Inactive
                            </option>
                        </select>
                        @error('status')
                            <small class="text-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Actions -->
                    <div class="form-actions">
                        <a href="{{ route('category.subcategory.index', $category) }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            {{ isset($subcategory) ? 'Update SubCategory' : 'Save SubCategory' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </flux:main>
</x-layouts.app.sidebar>

<x-layouts.app.sidebar>
    <flux:main>

        <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

        <div class="admin-container">

            <!-- Header -->
            <div class="admin-header">
                <h1 class="admin-title">
                    {{ isset($category) ? 'Edit Category' : 'Add Category' }}
                </h1>
            </div>

            <!-- Card -->
            <div class="admin-card">
                <form
                    action="{{ isset($category)
                        ? route('category.update', $category)
                        : route('category.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @if(isset($category))
                        @method('PUT')
                    @endif

                    <!-- Basic fields -->
                    <div class="form-grid">

                        <div class="form-group">
                            <label class="form-label">Category Name *</label>
                            <input type="text"
                                   name="name"
                                   value="{{ old('name', $category->name ?? '') }}"
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
                                   value="{{ old('priority', $category->priority ?? 0) }}"
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
                                  class="form-input">{{ old('description', $category->description ?? '') }}</textarea>
                        @error('description')
                            <small class="text-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Image -->
                    <div class="form-group mt-3">
                        <label class="form-label">Category Image</label>

                        @if(isset($category) && $category->image_url)
                            <div class="image-preview">
                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}">
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
                                @selected(old('status', $category->status ?? 'active') === 'active')>
                                Active
                            </option>
                            <option value="inactive"
                                @selected(old('status', $category->status ?? 'active') === 'inactive')>
                                Inactive
                            </option>
                        </select>
                        @error('status')
                            <small class="text-error">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Actions -->
                    <div class="form-actions">
                        <a href="{{ route('category.index') }}"
                           class="btn btn-secondary">
                            Cancel
                        </a>

                        <button type="submit" class="btn btn-primary">
                            {{ isset($category) ? 'Update Category' : 'Save Category' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </flux:main>
</x-layouts.app.sidebar>

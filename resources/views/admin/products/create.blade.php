<x-layouts.app.sidebar>
<flux:main>
<link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Add Product</h1>
    </div>

<div class="admin-card">
    <form method="POST" action="{{ route('products.store') }}">
        @csrf

        <!-- Basic Fields -->
        <div class="form-grid">

            <div class="form-group">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Base Price</label>
                <input type="number" step="0.01" name="base_price" class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-input">
                    <option value="">Select</option>
                    @foreach($categories as $c)
                        <option value="{{ $c->category_id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Vendor</label>
                <select name="vendor_id" class="form-input">
                    <option value="">Select</option>
                    @foreach($vendors as $v)
                        <option value="{{ $v->id }}">{{ $v->full_name }}</option>
                    @endforeach
                </select>
            </div>

        </div>

        <!-- Description -->
        <div class="form-group mt-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="3" class="form-input"></textarea>
        </div>

        <!-- Status -->
        <div class="form-group mt-3">
            <label class="checkbox-wrapper">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" checked>
                <span>Active</span>
            </label>
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                Save Product
            </button>
        </div>

    </form>
</div>

</div>

</flux:main>
</x-layouts.app.sidebar>

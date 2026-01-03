<x-layouts.app.sidebar>
<flux:main>
<link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">

    <!-- Header -->
    <div class="admin-header">
        <h1 class="admin-title">Add Attribute</h1>
    </div>

    <!-- Card -->
    <div class="admin-card">
        <form method="POST" action="{{ route('attributes.store') }}">
            @csrf

            <!-- Form Grid -->
            <div class="form-grid">

                <div class="form-group">
                    <label class="form-label">Attribute Name</label>
                    <input
                        type="text"
                        name="name"
                        class="form-input"
                        required
                    >
                </div>

                <div class="form-group">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-input">
                        <option value="text">Text</option>
                        <option value="number">Number</option>
                        <option value="color">Color</option>
                        <option value="select">Select</option>
                    </select>
                </div>

            </div>

            <!-- Variant Checkbox -->
            <div class="form-group mt-3">
                <label class="checkbox-wrapper">
                    <input
                        type="hidden"
                        name="is_variant_attribute"
                        value="0"
                    >
                    <input
                        type="checkbox"
                        name="is_variant_attribute"
                        value="1"
                    >
                    <span>Used for Product Variants</span>
                </label>
            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Save Attribute
                </button>

                <a href="{{ route('attributes.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>

</div>

</flux:main>
</x-layouts.app.sidebar>

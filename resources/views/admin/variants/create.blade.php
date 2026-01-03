<x-layouts.app.sidebar>
<flux:main>
  
        <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">
            Add Variant – {{ $product->name }}
        </h1>
    </div>
<div class="admin-card">
    <form method="POST" action="{{ route('products.variants.store', $product) }}">
        @csrf

        <!-- Basic Fields -->
        <div class="form-grid">

            <div class="form-group">
                <label class="form-label">SKU</label>
                <input type="text" name="sku" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-input" required>
            </div>

            <div class="form-group">
                <label class="form-label">Stock Quantity</label>
                <input type="number" name="stock_quantity" class="form-input" required>
            </div>

        </div>

        <!-- Attributes -->
        <div class="form-section">
            <h6 class="section-title">Variant Attributes</h6>

            @foreach($attributes as $attribute)
                <div class="attribute-group">
                    <div class="attribute-title">
                        {{ $attribute->name }}
                    </div>

                    <div class="attribute-options">
                        @foreach($attribute->values as $value)
                            <label class="attribute-option">
                                <input
                                    type="{{ $attribute->is_single_choice ? 'radio' : 'checkbox' }}"
                                    name="attribute_values[]"
                                    value="{{ $value->attribute_value_id }}"
                                >
                                <span>{{ $value->value }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                Save Variant
            </button>

            <a href="{{ route('products.variants.index', $product) }}"
               class="btn btn-secondary">
                Cancel
            </a>
        </div>

    </form>
</div>

</div>

</flux:main>
</x-layouts.app.sidebar>

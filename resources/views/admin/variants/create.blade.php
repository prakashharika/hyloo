<x-layouts.app.sidebar>
<flux:main>
    <style>
/* Container */
.admin-container {
    max-width: 1200px;
    margin: auto;
    padding: 1rem;
}

/* Card */
.admin-card {
    background: var(--card-bg, #fff);
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 2rem;
}

/* Header */
.admin-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
}

.admin-title {
    font-size: 1.6rem;
    font-weight: 700;
}

/* Form Labels and Inputs */
.form-label {
    font-weight: 600;
    font-size: 0.9rem;
}

.form-control, .form-select {
    border-radius: 10px;
    padding: 0.6rem 0.75rem;
    border: 1px solid #cbd5e1;
    width: 100%;
    box-sizing: border-box;
}

/* Buttons */
.btn-primary {
    border-radius: 10px;
    padding: 0.6rem 1.25rem;
    font-weight: 600;
    background-color: #2563eb;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background 0.2s;
}

.btn-primary:hover {
    background-color: #1d4ed8;
}

.btn-secondary {
    border-radius: 10px;
    padding: 0.6rem 1.25rem;
    font-weight: 600;
    background-color: #e5e7eb;
    color: #111827;
    border: none;
    cursor: pointer;
    transition: background 0.2s;
}

.btn-secondary:hover {
    background-color: #d1d5db;
}

/* Variant Attributes */
h6 {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

label.border {
    cursor: pointer;
    transition: all 0.2s;
    user-select: none;
}

label.border input[type="checkbox"] {
    margin-right: 0.35rem;
}

label.border:hover {
    background-color: #f1f5f9;
    border-color: #94a3b8;
}

/* Layout */
.row.g-3 {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
}

.mt-3 {
    margin-top: 1rem;
}

.mb-2 {
    margin-bottom: 0.5rem;
}

.d-flex {
    display: flex;
}

.flex-wrap {
    flex-wrap: wrap;
}
.attribute-option {
    border: 1px solid #cbd5e1;
    padding: 0.4rem 0.8rem;
    border-radius: 10px;
    cursor: pointer;
    transition: all 0.2s;
}

.attribute-option input {
    margin-right: 0.3rem;
}

.attribute-option input:checked + * {
    background-color: #2563eb;
    color: white;
    border-color: #1d4ed8;
}

.gap-2 {
    gap: 0.5rem;
}
</style>


<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">
            Add Variant – {{ $product->name }}
        </h1>
    </div>

    <div class="admin-card">
        <form method="POST" action="{{ route('products.variants.store', $product) }}">
            @csrf

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">SKU</label>
                    <input class="form-control" name="sku" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" class="form-control" name="stock_quantity" required>
                </div>

                <div class="col-12">
                    <h6 class="mt-3">Variant Attributes</h6>

                   @foreach($attributes as $attribute)
                <div class="mb-3">
                    <strong>{{ $attribute->name }}</strong>
                    <div class="d-flex flex-wrap gap-2 mt-1">
                        @foreach($attribute->values as $value)
                            <label class="attribute-option">
                                <input 
                                    type="{{ $attribute->is_single_choice ? 'radio' : 'checkbox' }}" 
                                    name="{{ $attribute->is_single_choice ? 'attribute_values['.$attribute->id.']' : 'attribute_values[]' }}" 
                                    value="{{ $value->attribute_value_id }}"
                                >
                                {{ $value->value }}
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

                </div>

                <div class="col-12 mt-3">
                    <button class="btn btn-primary">
                        Save Variant
                    </button>

                    <a href="{{ route('products.variants.index', $product) }}"
                       class="btn btn-secondary ms-2">
                        Cancel
                    </a>
                </div>

            </div>
        </form>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

<x-layouts.app.sidebar>
<flux:main>

<style>
    /* Container for admin pages */
    .admin-container {
        max-width: 1200px;
        margin: auto;
        padding: 1rem;
    }

    /* Card style */
    .admin-card {
        background: var(--card-bg, #fff);
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 2rem;
        box-shadow: 0 4px 8px rgba(0,0,0,0.03);
    }

    /* Header for each admin page */
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    /* Page title */
    .admin-title {
        font-size: 1.6rem;
        font-weight: 700;
    }

    /* Form labels */
    .form-label {
        font-weight: 600;
        font-size: 0.9rem;
    }

    /* Input fields */
    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.6rem 0.75rem;
        border: 1px solid #cbd5e1;
        font-size: 0.9rem;
        width: 100%;
    }

    /* Checkbox style */
    .form-check {
        margin-top: 0.75rem;
    }

    .form-check-input {
        margin-right: 0.5rem;
        width: 1.2rem;
        height: 1.2rem;
    }

    .form-check-label {
        font-weight: 500;
        font-size: 0.9rem;
    }

    /* Buttons */
    .btn-primary {
        border-radius: 10px;
        padding: 0.6rem 1.25rem;
        font-weight: 600;
        background-color: #2563eb;
        color: #fff;
        border: none;
        transition: background 0.2s;
    }

    .btn-primary:hover {
        background-color: #1e40af;
    }

    .btn-secondary {
        border-radius: 10px;
        padding: 0.6rem 1.25rem;
        font-weight: 600;
        background-color: #f3f4f6;
        color: #111827;
        border: 1px solid #d1d5db;
        transition: background 0.2s;
    }

    .btn-secondary:hover {
        background-color: #e5e7eb;
    }

    /* Row spacing for form */
    .row.g-3 {
        gap: 1rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .admin-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }
    }
</style>

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Edit Attribute – {{ $attribute->name }}</h1>
    </div>

    <div class="admin-card">
        <form method="POST" action="{{ route('attributes.update', $attribute) }}">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Attribute Name</label>
                    <input class="form-control" name="name" value="{{ $attribute->name }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Type</label>
                    <select class="form-select" name="type">
                        <option value="text" {{ $attribute->type === 'text' ? 'selected' : '' }}>Text</option>
                        <option value="number" {{ $attribute->type === 'number' ? 'selected' : '' }}>Number</option>
                        <option value="color" {{ $attribute->type === 'color' ? 'selected' : '' }}>Color</option>
                        <option value="select" {{ $attribute->type === 'select' ? 'selected' : '' }}>Select</option>
                    </select>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_variant_attribute" value="1" {{ $attribute->is_variant_attribute ? 'checked' : '' }}>
                        <label class="form-check-label">Used for Product Variants?</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">Update Attribute</button>
                    <a href="{{ route('attributes.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

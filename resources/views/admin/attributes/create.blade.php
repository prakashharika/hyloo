<x-layouts.app.sidebar>
<flux:main>

<style>
/* Container */
.admin-container {
    max-width: 1200px;
    margin: auto;
}

/* Card */
.admin-card {
    background: var(--card-bg, #fff);
    border: 1px solid #e2e8f0;
    border-radius: 14px;
    padding: 2rem;
    margin-top: 1rem;
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

/* Form labels */
.form-label {
    font-weight: 600;
    font-size: 0.9rem;
}

/* Inputs and selects */
.form-control,
.form-select {
    border-radius: 10px;
    padding: 0.6rem 0.75rem;
    border: 1px solid #cbd5e1;
    width: 100%;
    box-sizing: border-box;
}

/* Checkbox */
.form-check {
    margin-top: 0.5rem;
}

.form-check-input {
    margin-right: 0.5rem;
}

/* Buttons */
.btn-primary {
    border-radius: 10px;
    padding: 0.6rem 1.25rem;
    font-weight: 600;
    background-color: #0d6efd;
    color: #fff;
    border: none;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0b5ed7;
}

.btn-secondary {
    border-radius: 10px;
    padding: 0.6rem 1.25rem;
    font-weight: 600;
    background-color: #6c757d;
    color: #fff;
    border: none;
    cursor: pointer;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .admin-card {
        padding: 1rem;
    }
    .admin-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
    .form-label {
        font-size: 0.85rem;
    }
    .form-control, .form-select {
        font-size: 0.85rem;
        padding: 0.5rem 0.6rem;
    }
    .btn-primary, .btn-secondary {
        padding: 0.5rem 1rem;
        font-size: 0.85rem;
    }
}
</style>

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Add Attribute</h1>
    </div>

    <div class="admin-card">
        <form method="POST" action="{{ route('attributes.store') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Attribute Name</label>
                    <input class="form-control" name="name" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Type</label>
                    <select class="form-select" name="type">
                        <option value="text">Text</option>
                        <option value="number">Number</option>
                        <option value="color">Color</option>
                        <option value="select">Select</option>
                    </select>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="is_variant_attribute" value="1">
                        <label class="form-check-label">Used for Product Variants?</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">Save Attribute</button>
                    <a href="{{ route('attributes.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

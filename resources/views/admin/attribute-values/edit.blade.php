<x-layouts.app.sidebar>
<flux:main>

<style>
/* Container */
.admin-container {
    max-width: 900px;
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
    margin-bottom: 0.3rem;
    display: block;
}

/* Form controls */
.form-control,
.form-select {
    width: 100%;
    border-radius: 10px;
    padding: 0.6rem 0.75rem;
    border: 1px solid #ced4da;
    font-size: 0.9rem;
    box-sizing: border-box;
}

/* Buttons */
.btn-primary {
    border-radius: 10px;
    padding: 0.6rem 1.25rem;
    font-weight: 600;
    background-color: #0d6efd;
    color: #fff;
    text-decoration: none;
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
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* Form row spacing */
.row.g-3 {
    gap: 1rem;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .row.g-3 {
        flex-direction: column;
    }

    .col-md-6 {
        width: 100%;
    }
}
</style>

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">
            Edit Attribute Value – {{ $attribute_value->value }}
        </h1>
    </div>

    <div class="admin-card">
        <form method="POST" action="{{ route('attribute-values.update', $attribute_value) }}">
            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">
                    <label class="form-label">Attribute</label>
                    <select class="form-select" name="attribute_id" required>
                        <option value="">Select Attribute</option>
                        @foreach($attributes as $attr)
                            <option value="{{ $attr->attribute_id }}" 
                                {{ $attr->attribute_id == $attribute_value->attribute_id ? 'selected' : '' }}>
                                {{ $attr->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Value</label>
                    <input class="form-control" name="value" value="{{ $attribute_value->value }}" required>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">Update Value</button>
                    <a href="{{ route('attribute-values.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

<x-layouts.app.sidebar>
<flux:main>
<style>
    .admin-container {
        max-width: 1200px;
        margin: auto;
    }

    .admin-card {
        background: var(--card-bg, #fff);
        border: 1px solid #e2e8f0;
        border-radius: 14px;
        padding: 2rem;
    }

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

    .form-label {
        font-weight: 600;
        font-size: 0.9rem;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 0.6rem 0.75rem;
    }

    .btn-primary {
        border-radius: 10px;
        padding: 0.6rem 1.25rem;
        font-weight: 600;
    }

    .table {
        border-radius: 12px;
        overflow: hidden;
    }

    .table th {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: #f8fafc;
    }

    .badge-active {
        background: #dcfce7;
        color: #166534;
        padding: 0.35rem 0.75rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .badge-inactive {
        background: #fee2e2;
        color: #991b1b;
        padding: 0.35rem 0.75rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    .action-links a {
        margin-right: 0.75rem;
        font-weight: 600;
        text-decoration: none;
    }
</style>

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Add Product</h1>
    </div>

    <div class="admin-card">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Product Name</label>
                    <input class="form-control" name="name" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Base Price</label>
                    <input type="number" step="0.01" class="form-control" name="base_price">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Category</label>
                    <select class="form-select" name="category_id">
                        <option value="">Select</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->category_id }}">{{ $c->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Vendor</label>
                    <select class="form-select" name="vendor_id">
                        <option value="">Select</option>
                        @foreach($vendors as $v)
                            <option value="{{ $v->id }}">{{ $v->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>

                <div class="col-12">
                    <div class="form-check">
                       <input type="hidden" name="is_active" value="0">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>

                        <label class="form-check-label">Active</label>
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-primary">Save Product</button>
                </div>
            </div>
        </form>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

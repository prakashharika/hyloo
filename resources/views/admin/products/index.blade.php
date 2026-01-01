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
        <h1 class="admin-title">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="admin-card">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Vendor</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category?->name ?? '—' }}</td>
                    <td>{{ $product->vendor?->full_name ?? '—' }}</td>
                    <td>₹ {{ number_format($product->base_price, 2) }}</td>
                    <td>
                        @if($product->is_active)
                            <span class="badge-active">Active</span>
                        @else
                            <span class="badge-inactive">Inactive</span>
                        @endif
                    </td>
                    <td class="action-links">
                        <a href="{{ route('admin.products.edit', $product) }}">Edit</a>
                        <a href="{{ route('admin.products.variants.index', $product) }}">Variants</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

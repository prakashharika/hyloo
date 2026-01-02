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

/* Buttons */
.btn-primary {
    border-radius: 10px;
    padding: 0.5rem 1.25rem;
    font-weight: 600;
    background-color: #0d6efd;
    color: #fff;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
}

.btn-primary:hover {
    background-color: #0b5ed7;
}

/* Alerts */
.alert {
    padding: 0.75rem 1rem;
    border-radius: 10px;
    margin-bottom: 1rem;
}

.alert-success {
    background-color: #dcfce7;
    color: #166534;
}

/* Table */
.table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 12px;
    overflow: hidden;
}

.table th,
.table td {
    padding: 0.75rem 1rem;
    text-align: left;
    vertical-align: middle;
}

.table th {
    background-color: #f8fafc;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table-hover tbody tr:hover {
    background-color: #f1f5f9;
}

/* Badges */
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

/* Action links */
.action-links a {
    margin-right: 0.75rem;
    font-weight: 600;
    text-decoration: none;
    color: #0d6efd;
}

.action-links a:hover {
    text-decoration: underline;
}

/* Pagination (if using Laravel links) */
.pagination {
    display: flex;
    list-style: none;
    gap: 0.5rem;
    margin-top: 1rem;
}

.pagination li a,
.pagination li span {
    padding: 0.4rem 0.8rem;
    border-radius: 6px;
    border: 1px solid #e2e8f0;
    text-decoration: none;
    color: #0d6efd;
}

.pagination li a:hover {
    background-color: #f1f5f9;
}

/* Responsive */
@media (max-width: 768px) {
    .admin-card {
        padding: 1rem;
    }

    .admin-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .btn-primary {
        padding: 0.4rem 1rem;
        font-size: 0.85rem;
    }

    .table th, .table td {
        font-size: 0.85rem;
        padding: 0.5rem 0.75rem;
    }
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
                        <a href="{{ route('products.edit', $product) }}">Edit</a>
                        <a href="{{ route('products.variants.index', $product) }}">Variants</a>
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

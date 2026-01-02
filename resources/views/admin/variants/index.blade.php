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
        <h1 class="admin-title">Variants – {{ $product->name }}</h1>
       <a href="{{ route('products.variants.create', $product) }}" class="btn btn-primary">
    Add Variant
</a>

    </div>

    <div class="admin-card">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>SKU</th>
                    <th>Attributes</th>
                    <th>Price</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($variants as $variant)
                <tr>
                    <td>{{ $variant->sku }}</td>
                    <td>
                        @foreach($variant->attributes as $attr)
                            <span class="badge bg-light text-dark">
                                {{ $attr->attribute->name }}: {{ $attr->value }}
                            </span>
                        @endforeach
                    </td>
                    <td>₹ {{ $variant->price }}</td>
                    <td>{{ $variant->stock_quantity }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

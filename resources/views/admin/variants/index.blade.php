<x-layouts.app.sidebar>
<flux:main>

        <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

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

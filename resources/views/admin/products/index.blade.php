<x-layouts.app.sidebar>
<flux:main>

<link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
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
               <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <div class="flex space-x-2">
                        <a href="{{ route('products.edit', $product) }}"
                        class="text-blue-600 hover:text-blue-900">
                            Edit
                        </a>

                        <a href="{{ route('products.variants.index', $product) }}"
                        class="text-green-600 hover:text-blue-900">
                            Variants
                        </a>
                    </div>
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

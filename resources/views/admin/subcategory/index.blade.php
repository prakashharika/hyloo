<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
<link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">
    <div class="admin-header">
        <div class="flex items-center justify-between w-full">
            <h1 class="admin-title">SubCategories - {{ $category->name }}</h1>
            <div class="flex space-x-2">
                <a href="{{ route('category.index') }}" class="btn btn-secondary">
                    Back to Categories
                </a>
                <a href="{{ route('category.subcategory.create', $category) }}" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                    <i class="bi bi-plus-lg"></i> Add New SubCategory
                </a>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-4">
            {{ session('success') }}
        </div>
    @endif

<div class="admin-card">
    <table class="table table-hover align-middle">
            <thead class="bg-gray-50">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subcategories as $subcategory)
                <tr>
                    <td>
                        {{ $subcategory->subcategory_id }}
                    </td>
                    <td>
                        @if($subcategory->image_url)
                            <img src="{{ $subcategory->image_url }}" alt="{{ $subcategory->name }}" 
                                class="h-10 w-10 rounded-full object-cover">
                        @else
                            <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-500">No image</span>
                            </div>
                        @endif
                    </td>
                    <td>
                        {{ $subcategory->name }}
                    </td>
                    <td>
                        {{ $subcategory->description ?? 'No description' }}
                    </td>
                    <td>
                        {{ $subcategory->priority }}
                    </td>
                    <td>
                        <form action="{{ route('category.subcategory.toggle-status', [$category, $subcategory]) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                {{ $subcategory->status === 'active' 
                                    ? 'bg-green-100 text-green-800' 
                                    : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($subcategory->status) }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="flex space-x-2">
                            <a href="{{ route('category.subcategory.edit', [$category, $subcategory]) }}" 
                            class="text-blue-600 hover:text-blue-900">
                                Edit
                            </a>
                            <form action="{{ route('category.subcategory.destroy', [$category, $subcategory]) }}" method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this subcategory?')"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        No subcategories found. <a href="{{ route('category.subcategory.create', $category) }}" class="text-blue-600 hover:underline">Create one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>

 </table>

    @if($subcategories->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $subcategories->links() }}
    </div>
    @endif
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

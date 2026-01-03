<x-layouts.app.sidebar :title="$title ?? null">
    <flux:main>
<link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Category Management</h1>
        <a href="{{ route('category.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 00-1 1v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 100-2h-5V4a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
            <i class="bi bi-plus-lg"></i> Add New Category
        </a>
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
                @forelse($categories as $category)
                <tr>
                    <td>
                        {{ $category->category_id }}
                    </td>
                    <td>
                        @if($category->image_url)
                            <img src="{{ $category->image_url }}" alt="{{ $category->name }}" 
                                class="h-10 w-10 rounded-full object-cover">
                        @else
                            <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-gray-500">No image</span>
                            </div>
                        @endif
                    </td>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->description ?? 'No description' }}
                    </td>
                    <td>
                        {{ $category->priority }}
                    </td>
                    <td>
                        <form action="{{ route('category.toggle-status', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                                {{ $category->status === 'active' 
                                    ? 'bg-green-100 text-green-800' 
                                    : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($category->status) }}
                            </button>
                        </form>
                    </td>
                    <td>
                        <div class="flex space-x-2">
                            <a href="{{ route('category.edit', $category) }}" 
                            class="text-blue-600 hover:text-blue-900">
                                Edit
                            </a>
                            <form action="{{ route('category.destroy', $category) }}" method="POST" 
                                onsubmit="return confirm('Are you sure you want to delete this category?')"
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
                        No categories found. <a href="{{ route('category.create') }}" class="text-blue-600 hover:underline">Create one</a>
                    </td>
                </tr>
                @endforelse
            </tbody>

 </table>

    @if($categories->hasPages())
    <div class="px-6 py-4 border-t">
        {{ $categories->links() }}
    </div>
    @endif
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

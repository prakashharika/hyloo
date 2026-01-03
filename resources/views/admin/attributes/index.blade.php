<x-layouts.app.sidebar>
<flux:main>
<link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Attributes</h1>
        <a href="{{ route('attributes.create') }}" class="btn btn-primary">Add Attribute</a>
    </div>

    <div class="admin-card">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Variant?</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attributes as $attribute)
                    <tr>
                        <td>{{ $attribute->name }}</td>
                        <td>{{ $attribute->type }}</td>
                        <td>{{ $attribute->is_variant_attribute ? 'Yes' : 'No' }}</td>
                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a
                                    href="{{ route('attributes.edit', $attribute) }}"
                                    class="text-blue-600 hover:text-blue-900"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('attributes.destroy', $attribute) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this attribute?')"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-red-600 hover:text-red-900"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

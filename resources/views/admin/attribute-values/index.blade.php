<x-layouts.app.sidebar>
<flux:main>
    <link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">
<div class="admin-container">
    <div class="admin-header">
        <h1 class="admin-title">Attribute Values</h1>
        <a href="{{ route('attribute-values.create') }}" class="btn btn-primary">Add Value</a>
    </div>

    <div class="admin-card">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Attribute</th>
                    <th>Value</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($values as $value)
                    <tr>
                        <td>{{ $value->attribute->name }}</td>
                        <td>{{ $value->value }}</td>
                       <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <a
                                    href="{{ route('attribute-values.edit', $value) }}"
                                    class="text-blue-600 hover:text-blue-900"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('attribute-values.destroy', $value) }}"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this value?')"
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

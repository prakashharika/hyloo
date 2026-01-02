<x-layouts.app.sidebar>
<flux:main>

<style>
/* Container */
.admin-container {
    max-width: 1200px;
    margin: auto;
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
    font-size: 0.9rem;
}

.table th {
    background: #f8fafc;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.table tr:nth-child(even) {
    background: #f9fafb;
}

/* Action links */
.action-links a {
    margin-right: 0.75rem;
    font-weight: 600;
    text-decoration: none;
    color: #0d6efd;
}

.action-links button {
    font-weight: 600;
    text-decoration: none;
    background: none;
    border: none;
    padding: 0;
    cursor: pointer;
    color: #dc3545; /* Red for delete */
}

.action-links button:hover,
.action-links a:hover {
    text-decoration: underline;
}

/* Buttons */
.btn-primary {
    border-radius: 10px;
    padding: 0.6rem 1.25rem;
    font-weight: 600;
    background-color: #0d6efd;
    color: #fff;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0b5ed7;
}

.btn-secondary {
    border-radius: 10px;
    padding: 0.6rem 1.25rem;
    font-weight: 600;
    background-color: #6c757d;
    color: #fff;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .table,
    .table th,
    .table td {
        font-size: 0.85rem;
    }
    .admin-card {
        padding: 1rem;
    }
    .admin-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }
}
</style>



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
                        <td class="action-links">
                            <a href="{{ route('attributes.edit', $attribute) }}">Edit</a>
                            <form action="{{ route('attributes.destroy', $attribute) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</flux:main>
</x-layouts.app.sidebar>

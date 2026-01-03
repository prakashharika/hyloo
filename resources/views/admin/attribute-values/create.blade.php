<x-layouts.app.sidebar>
<flux:main>
<link rel="stylesheet" href="{{ asset('css/admin-style.css') }}">

<div class="admin-container">

    <!-- Header -->
    <div class="admin-header">
        <h1 class="admin-title">Add Attribute Value</h1>
    </div>

    <!-- Card -->
    <div class="admin-card">
        <form method="POST" action="{{ route('attribute-values.store') }}">
            @csrf

            <!-- Form Grid -->
            <div class="form-grid">

                <div class="form-group">
                    <label class="form-label">Attribute</label>
                    <select name="attribute_id" class="form-input" required>
                        <option value="">Select Attribute</option>
                        @foreach($attributes as $attr)
                            <option value="{{ $attr->attribute_id }}">
                                {{ $attr->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Value</label>
                    <input
                        type="text"
                        name="value"
                        class="form-input"
                        required
                    >
                </div>

            </div>

            <!-- Actions -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Save Value
                </button>

                <a href="{{ route('attribute-values.index') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>
    </div>

</div>

</flux:main>
</x-layouts.app.sidebar>

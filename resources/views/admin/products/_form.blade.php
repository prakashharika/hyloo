<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Product Name</label>
        <input
            class="form-control"
            name="name"
            value="{{ old('name', $product->name ?? '') }}"
            required
        >
    </div>

    <div class="col-md-6">
        <label class="form-label">Base Price</label>
        <input
            type="number"
            step="0.01"
            class="form-control"
            name="base_price"
            value="{{ old('base_price', $product->base_price ?? '') }}"
        >
    </div>

    <div class="col-md-6">
        <label class="form-label">Category</label>
        <select class="form-select" name="category_id">
            <option value="">Select</option>
            @foreach($categories as $c)
                <option
                    value="{{ $c->category_id }}"
                    @selected(old('category_id', $product->category_id ?? null) == $c->category_id)
                >
                    {{ $c->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Vendor</label>
        <select class="form-select" name="vendor_id">
            <option value="">Select</option>
            @foreach($vendors as $v)
                <option
                    value="{{ $v->id }}"
                    @selected(old('vendor_id', $product->vendor_id ?? null) == $v->id)
                >
                    {{ $v->full_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="col-12">
        <label class="form-label">Description</label>
        <textarea
            class="form-control"
            rows="3"
            name="description"
        >{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="col-12">
        <input type="hidden" name="is_active" value="0">
        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                name="is_active"
                value="1"
                @checked(old('is_active', $product->is_active ?? true))
            >
            <label class="form-check-label">Active</label>
        </div>
    </div>
</div>

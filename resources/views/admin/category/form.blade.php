<div class="space-y-6">
    <!-- Name -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Category Name *</label>
        <input type="text" name="name" id="name" 
               value="{{ old('name', $category->name ?? '') }}"
               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
               required>
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="3"
                  class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $category->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Image Upload -->
    <div>
        <label for="image" class="block text-sm font-medium text-gray-700">Category Image</label>
        
        @if(isset($category) && $category->image_url)
            <div class="mt-2">
                <img src="{{ $category->image_url }}" alt="{{ $category->name }}" 
                     class="h-32 w-32 object-cover rounded-lg">
                <p class="mt-2 text-sm text-gray-500">Current image</p>
            </div>
        @endif
        
        <div class="mt-2">
            <input type="file" name="image" id="image" 
                   class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                   accept="image/*">
            <p class="mt-1 text-xs text-gray-500">JPG, PNG, GIF, SVG up to 2MB</p>
        </div>
        @error('image')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Status and Priority -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status *</label>
            <select name="status" id="status" 
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
                <option value="active" {{ (old('status', $category->status ?? 'active') == 'active') ? 'selected' : '' }}>
                    Active
                </option>
                <option value="inactive" {{ (old('status', $category->status ?? 'active') == 'inactive') ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Priority -->
        <div>
            <label for="priority" class="block text-sm font-medium text-gray-700">Priority *</label>
            <input type="number" name="priority" id="priority" min="0" step="1"
                   value="{{ old('priority', $category->priority ?? 0) }}"
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   required>
            <p class="mt-1 text-xs text-gray-500">Lower number = higher priority</p>
            @error('priority')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
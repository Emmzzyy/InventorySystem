@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-primary">Edit Product</h1>
        <p class="text-gray-600">Update product information</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-sm p-8">
        <form action="{{ route('products.update', $product->id) }}" 
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Product Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name</label>
                    <input type="text" 
                           id="name"
                           name="name" 
                           value="{{ old('name', $product->name) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter product name">
                    @error('name')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- SKU -->
                <div>
                    <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">SKU</label>
                    <input type="text" 
                           id="sku"
                           name="sku" 
                           value="{{ old('sku', $product->sku) }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter SKU">
                    @error('sku')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category</label>
                    <select id="category_id"
                            name="category_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div>
                    <label for="unit_price" class="block text-sm font-medium text-gray-700 mb-2">Unit Price</label>
                    <input type="number" 
                           id="unit_price"
                           name="unit_price" 
                           step="0.01"
                           value="{{ old('unit_price', $product->unit_price) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="0.00">
                    @error('unit_price')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                    <input type="number" 
                           id="quantity"
                           name="quantity" 
                           value="{{ old('quantity', $product->quantity) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="0">
                    @error('quantity')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Min Stock -->
                <div>
                    <label for="min_stock" class="block text-sm font-medium text-gray-700 mb-2">Minimum Stock Level</label>
                    <input type="number" 
                           id="min_stock"
                           name="min_stock" 
                           value="{{ old('min_stock', $product->min_stock) }}"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="10">
                    @error('min_stock')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description"
                              name="description" 
                              rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                              placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Image -->
                <div class="md:col-span-2">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Product Image</label>
                    <input type="file" 
                           id="image"
                           name="image" 
                           accept="image/*"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                    @error('image')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                    
                    @if($product->image)
                        <div class="mt-4 flex items-center gap-4">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-24 h-24 rounded-lg object-cover border border-gray-200">
                            <div class="text-sm text-gray-600">
                                <p>Current image</p>
                                <p class="text-xs text-gray-500">Leave empty to keep current image</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex gap-4">
                <button type="submit" 
                        class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
                    <i class="fas fa-save mr-2"></i>Update Product
                </button>
                <a href="{{ route('products.index') }}" 
                   class="bg-gray-200 text-gray-700 font-semibold px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
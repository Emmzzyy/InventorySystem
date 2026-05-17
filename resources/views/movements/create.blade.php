@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-primary">Add Stock Movement</h1>
        <p class="text-gray-600">Record inventory stock movement</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-xl shadow-sm p-8">
        <form action="{{ route('movements.store') }}"
              method="POST">
            @csrf

            <div class="space-y-6">
                <!-- Product -->
                <div>
                    <label for="product_id" class="block text-sm font-medium text-gray-700 mb-2">Product</label>
                    <select id="product_id"
                            name="product_id"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        <option value="">Select Product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} (Stock: {{ $product->quantity }})
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Movement Type -->
                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Movement Type</label>
                    <select id="type"
                            name="type"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent">
                        <option value="IN" {{ old('type') == 'IN' ? 'selected' : '' }}>Stock IN</option>
                        <option value="OUT" {{ old('type') == 'OUT' ? 'selected' : '' }}>Stock OUT</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-2">Quantity</label>
                    <input type="number" 
                           id="quantity"
                           name="quantity" 
                           value="{{ old('quantity') }}"
                           required
                           min="1"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                           placeholder="Enter quantity">
                    @error('quantity')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remarks -->
                <div>
                    <label for="remarks" class="block text-sm font-medium text-gray-700 mb-2">Remarks</label>
                    <textarea id="remarks"
                              name="remarks" 
                              rows="3"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent focus:border-transparent"
                              placeholder="Enter remarks (optional)">{{ old('remarks') }}</textarea>
                    @error('remarks')
                        <p class="mt-1 text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex gap-4">
                <button type="submit" 
                        class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
                    <i class="fas fa-save mr-2"></i>Save Movement
                </button>
                <a href="{{ route('movements.index') }}" 
                   class="bg-gray-200 text-gray-700 font-semibold px-6 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
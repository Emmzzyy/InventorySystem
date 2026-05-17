@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-primary">Products</h1>
            <p class="text-gray-600">Manage your inventory products</p>
        </div>
        <a href="{{ route('products.create') }}" 
           class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
            <i class="fas fa-plus mr-2"></i>Add Product
        </a>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Image</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Name</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">SKU</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Price</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Quantity</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Status</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="w-12 h-12 rounded-lg object-cover">
                            @else
                                <div class="w-12 h-12 rounded-lg bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-box text-gray-400"></i>
                                </div>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                            <p class="text-sm text-gray-500">{{ Str::limit($product->description, 30) }}</p>
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $product->sku ?? 'N/A' }}</td>
                        <td class="py-3 px-4 text-gray-800 font-semibold">${{ number_format($product->unit_price, 2) }}</td>
                        <td class="py-3 px-4">
                            <span class="{{ $product->quantity <= $product->min_stock ? 'text-red-500' : 'text-gray-800' }}">
                                {{ $product->quantity }}
                            </span>
                        </td>
                        <td class="py-3 px-4">
                            @if($product->quantity == 0)
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Out of Stock</span>
                            @elseif($product->quantity <= $product->min_stock)
                                <span class="bg-accent/20 text-accent px-3 py-1 rounded-full text-sm">Low Stock</span>
                            @else
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">In Stock</span>
                            @endif
                        </td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="text-secondary hover:text-primary transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($products->hasPages())
            <div class="mt-4 flex justify-center">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
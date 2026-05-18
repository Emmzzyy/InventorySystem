@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-primary">Inventory Reports</h1>
            <p class="text-gray-600">View and export inventory data</p>
        </div>
        <a href="{{ route('reports.csv') }}" 
           class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
            <i class="fas fa-download mr-2"></i>Export CSV
        </a>
    </div>

    <!-- Stock Summary -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-primary mb-4">Stock Summary</h2>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Name</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">SKU</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Price</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Quantity</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">
                            <p class="font-semibold text-gray-800">{{ $product->name }}</p>
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $product->sku ?? 'N/A' }}</td>
                        <td class="py-3 px-4 text-gray-800 font-semibold">${{ number_format($product->unit_price, 2) }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $product->quantity }}</td>
                        <td class="py-3 px-4">
                            @if($product->quantity == 0)
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Out of Stock</span>
                            @elseif($product->quantity <= $product->min_stock)
                                <span class="bg-accent/20 text-accent px-3 py-1 rounded-full text-sm">Low Stock</span>
                            @else
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">In Stock</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Movement History -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-primary mb-4">Movement History</h2>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Product</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Type</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Quantity</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($movements as $movement)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">
                            <p class="font-semibold text-gray-800">{{ $movement->product->name }}</p>
                        </td>
                        <td class="py-3 px-4">
                            @if($movement->type == 'IN')
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Stock IN</span>
                            @else
                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Stock OUT</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $movement->quantity }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $movement->created_at->format('M d, Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
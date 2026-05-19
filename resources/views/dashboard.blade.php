 @extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h1 class="text-3xl font-bold text-primary">Admin Dashboard</h1>
        <p class="text-gray-600">Inventory Overview</p>
    </div>

    <!-- Key Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Products -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Products</p>
                    <p class="text-3xl font-bold text-blue-600">{{ $totalProducts }}</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-boxes text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Categories -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Categories</p>
                    <p class="text-3xl font-bold text-green-600">{{ $totalCategories }}</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-tags text-green-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Total Suppliers -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Suppliers</p>
                    <p class="text-3xl font-bold text-purple-600">{{ $totalSuppliers }}</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-truck text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Stock Movements -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Stock Movements</p>
                    <p class="text-3xl font-bold text-orange-600">{{ $totalStockMovements }}</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <i class="fas fa-exchange-alt text-orange-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Low Stock Products -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Low Stock Products</p>
                    <p class="text-3xl font-bold text-yellow-600">{{ $lowStockProducts->count() }}</p>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <i class="fas fa-exclamation-triangle text-yellow-600 text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Out of Stock Products -->
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Out of Stock Products</p>
                    <p class="text-3xl font-bold text-red-600">{{ $outOfStockProducts->count() }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-times-circle text-red-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Low Stock Alert -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-primary mb-4">Low Stock Alert</h2>
        @if($lowStockProducts->count() > 0)
            <ul class="list-disc list-inside space-y-2">
                @foreach($lowStockProducts as $product)
                    <li class="text-gray-700">{{ $product->name }} ({{ $product->quantity }} remaining)</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No products are currently low in stock.</p>
        @endif
    </div>

    <!-- Out of Stock Alert -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-primary mb-4">Out of Stock Alert</h2>
        @if($outOfStockProducts->count() > 0)
            <ul class="list-disc list-inside space-y-2">
                @foreach($outOfStockProducts as $product)
                    <li class="text-gray-700">{{ $product->name }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No products are currently out of stock.</p>
        @endif
    </div>

    <!-- Recent Stock Movements -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-primary mb-4">Recent Stock Movements</h2>
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
                    @if($recentStockMovements->count() > 0)
                        @foreach($recentStockMovements as $movement)
                            <tr class="border-b border-gray-100">
                                <td class="py-3 px-4">{{ $movement->product->name ?? 'N/A' }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-3 py-1 rounded-full text-sm {{ $movement->type === 'IN' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $movement->type }}
                                    </span>
                                </td>
                                <td class="py-3 px-4">{{ $movement->quantity }}</td>
                                <td class="py-3 px-4">{{ $movement->created_at->format('M d, Y H:i') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-500">No recent stock movements</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
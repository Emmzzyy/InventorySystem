@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-primary">Dashboard</h1>
            <p class="text-gray-600">Welcome back, {{ auth()->user()->name }}</p>
        </div>
        <div class="relative">
            <input type="text" placeholder="Search products, suppliers..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-accent w-64">
            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
        </div>
    </div>

    <!-- Key Metrics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-primary">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Total Products</p>
                    <p class="text-3xl font-bold text-primary">{{ $totalProducts }}</p>
                </div>
                <div class="bg-primary/10 p-3 rounded-full">
                    <i class="fas fa-boxes text-primary text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-secondary">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Inventory Value</p>
                    <p class="text-3xl font-bold text-secondary">${{ number_format($totalProducts * 100, 1) }}k</p>
                </div>
                <div class="bg-secondary/10 p-3 rounded-full">
                    <i class="fas fa-dollar-sign text-secondary text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Out of Stock</p>
                    <p class="text-3xl font-bold text-red-500">{{ $outOfStockProducts->count() }}</p>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-exclamation-triangle text-red-500 text-xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-accent">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">Low Stock Alerts</p>
                    <p class="text-3xl font-bold text-accent">{{ $lowStockProducts->count() }}</p>
                </div>
                <div class="bg-accent/20 p-3 rounded-full">
                    <i class="fas fa-bell text-accent text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Critical Stock Levels Table -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-primary mb-4">Critical Stock Levels</h2>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Product Name</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">SKU</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Current Stock</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($outOfStockProducts->take(5) as $product)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">{{ $product->name }}</td>
                        <td class="py-3 px-4">{{ $product->sku ?? 'N/A' }}</td>
                        <td class="py-3 px-4">{{ $product->quantity }}</td>
                        <td class="py-3 px-4">
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Out of Stock</span>
                        </td>
                    </tr>
                    @endforeach
                    @foreach($lowStockProducts->take(5) as $product)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">{{ $product->name }}</td>
                        <td class="py-3 px-4">{{ $product->sku ?? 'N/A' }}</td>
                        <td class="py-3 px-4">{{ $product->quantity }}</td>
                        <td class="py-3 px-4">
                            <span class="bg-accent/20 text-accent px-3 py-1 rounded-full text-sm">Low Stock</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Supplier Status and Recent Orders -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Supplier Status -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-bold text-primary mb-4">Supplier Status</h2>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fas fa-check text-green-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">ABC Supplies</p>
                            <p class="text-sm text-gray-500">Last delivery: 2 days ago</p>
                        </div>
                    </div>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">On Time</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="bg-yellow-100 p-2 rounded-full">
                            <i class="fas fa-clock text-yellow-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">XYZ Distributors</p>
                            <p class="text-sm text-gray-500">Expected: Today</p>
                        </div>
                    </div>
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Delayed</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div class="flex items-center gap-3">
                        <div class="bg-green-100 p-2 rounded-full">
                            <i class="fas fa-check text-green-500"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800">Global Imports</p>
                            <p class="text-sm text-gray-500">Last delivery: 5 days ago</p>
                        </div>
                    </div>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">On Time</span>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-bold text-primary mb-4">Recent Orders</h2>
            <div class="space-y-3">
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-800">Order #ORD-001</p>
                        <p class="text-sm text-gray-500">5 items • $2,450</p>
                    </div>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Shipped</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-800">Order #ORD-002</p>
                        <p class="text-sm text-gray-500">3 items • $1,200</p>
                    </div>
                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Pending</span>
                </div>
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                    <div>
                        <p class="font-semibold text-gray-800">Order #ORD-003</p>
                        <p class="text-sm text-gray-500">8 items • $3,800</p>
                    </div>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Shipped</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Warehouse Analytics and Automated Restock -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Warehouse Analytics -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow-sm p-6">
            <h2 class="text-xl font-bold text-primary mb-4">Warehouse Analytics</h2>
            <div class="bg-gray-100 rounded-lg h-64 flex items-center justify-center">
                <div class="text-center text-gray-500">
                    <i class="fas fa-chart-line text-4xl mb-2"></i>
                    <p>Analytics chart placeholder</p>
                </div>
            </div>
        </div>

        <!-- Automated Restock -->
        <div class="bg-gradient-to-br from-primary to-secondary rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center gap-2 mb-4">
                <i class="fas fa-robot text-2xl"></i>
                <h2 class="text-xl font-bold">Automated Restock</h2>
            </div>
            <p class="text-accent mb-4">AI-powered system automatically generates restock orders when inventory falls below threshold levels.</p>
            <div class="bg-white/20 rounded-lg p-4 mb-4">
                <p class="text-sm">Last run: 2 hours ago</p>
                <p class="text-sm">Orders generated: 3</p>
            </div>
            <button class="w-full bg-accent text-primary font-semibold py-2 rounded-lg hover:bg-white transition">
                Review Orders
            </button>
        </div>
    </div>
</div>
@endsection
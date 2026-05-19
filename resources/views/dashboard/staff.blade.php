@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-3xl font-bold text-primary">Staff Dashboard</h1>
        <p class="text-gray-600">Welcome, {{ auth()->user()->name }}!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6">
        <h2 class="text-xl font-bold text-primary mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <a href="{{ route('movements.index') }}" class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <i class="fas fa-list text-primary"></i>
                <span class="font-medium">View Stock Movements</span>
            </a>
            <a href="{{ route('movements.create') }}" class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <i class="fas fa-plus text-primary"></i>
                <span class="font-medium">Add New Movement</span>
            </a>
            <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                <i class="fas fa-cog text-primary"></i>
                <span class="font-medium">Account Settings</span>
            </a>
        </div>
    </div>

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
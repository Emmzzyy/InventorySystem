@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-primary">Stock Movements</h1>
            <p class="text-gray-600">Track inventory movements</p>
        </div>
        <a href="{{ route('movements.create') }}" 
           class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
            <i class="fas fa-plus mr-2"></i>Add Movement
        </a>
    </div>

    <!-- Movements Table -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Product</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Type</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Quantity</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Remarks</th>
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
                        <td class="py-3 px-4 text-gray-600">{{ $movement->remarks ?? '-' }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $movement->created_at->format('M d, Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        @if($movements->hasPages())
            <div class="mt-4">
                {{ $movements->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Inventory Overview</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-blue-600">Total Products</h4>
                            <p class="text-2xl font-bold text-blue-900">{{ $totalProducts }}</p>
                        </div>

                        <div class="bg-yellow-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-yellow-600">Low Stock Products</h4>
                            <p class="text-2xl font-bold text-yellow-900">{{ $lowStockProducts->count() }}</p>
                        </div>

                        <div class="bg-red-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-red-600">Out of Stock Products</h4>
                            <p class="text-2xl font-bold text-red-900">{{ $outOfStockProducts->count() }}</p>
                        </div>
                    </div>

                    @if($lowStockProducts->count() > 0)
                        <div class="mb-6">
                            <h4 class="text-md font-semibold mb-2">Low Stock Alert</h4>
                            <ul class="list-disc list-inside">
                                @foreach($lowStockProducts as $product)
                                    <li>{{ $product->name }} ({{ $product->quantity }} remaining)</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if($outOfStockProducts->count() > 0)
                        <div class="mb-6">
                            <h4 class="text-md font-semibold mb-2">Out of Stock Alert</h4>
                            <ul class="list-disc list-inside">
                                @foreach($outOfStockProducts as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
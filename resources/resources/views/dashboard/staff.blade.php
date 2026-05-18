<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Staff Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h3>

                    <p class="mb-4">You have access to manage stock movements. Use the navigation above to get started.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-green-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-green-600">Quick Actions</h4>
                            <ul class="mt-2 space-y-1">
                                <li><a href="{{ route('movements.index') }}" class="text-green-700 hover:text-green-900">View Stock Movements</a></li>
                                <li><a href="{{ route('movements.create') }}" class="text-green-700 hover:text-green-900">Add New Movement</a></li>
                            </ul>
                        </div>

                        <div class="bg-blue-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-blue-600">Recent Activity</h4>
                            <p class="text-sm text-blue-700 mt-2">Check the stock movements page for your recent activities.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
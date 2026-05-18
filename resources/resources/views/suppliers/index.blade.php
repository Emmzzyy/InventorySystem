@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-primary">Suppliers</h1>
            <p class="text-gray-600">Manage your suppliers</p>
        </div>
        <a href="{{ route('suppliers.create') }}" 
           class="bg-accent text-primary font-semibold px-6 py-2 rounded-lg hover:bg-white transition duration-200 shadow-lg">
            <i class="fas fa-plus mr-2"></i>Add Supplier
        </a>
    </div>

    <!-- Suppliers Table -->
    <div class="bg-white rounded-xl shadow-sm p-6">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Company</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Contact Person</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Phone</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Email</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">
                            <p class="font-semibold text-gray-800">{{ $supplier->company_name }}</p>
                        </td>
                        <td class="py-3 px-4 text-gray-600">{{ $supplier->contact_person }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $supplier->phone }}</td>
                        <td class="py-3 px-4 text-gray-600">{{ $supplier->email }}</td>
                        <td class="py-3 px-4">
                            <div class="flex gap-2">
                                <a href="{{ route('suppliers.edit', $supplier->id) }}" 
                                   class="text-secondary hover:text-primary transition">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('suppliers.destroy', $supplier->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Are you sure you want to delete this supplier?');">
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
        
        @if($suppliers->hasPages())
            <div class="mt-4">
                {{ $suppliers->links() }}
            </div>
        @endif
    </div>
</div>
@endsection